<?php

/**
 * An example of how to handle the user authorization process for requesting accessing to a LinkedIn
 * account through oAuth. It displays a simple UI, storing the needed state in session variables. 
 * For a real app, you'll probably want to keep them in your database, but this arrangement makes the
 * example simpler.
 *
 * To install this example, just copy all the files in this folder onto your web server, edit config.php
 * to add the oAuth tokens you've obtained from LinkedIn and then load this index page in your browser.
 
 Licensed under the 2-clause (ie no advertising requirement) BSD license,
 making it easy to reuse for commercial or GPL projects:
 
 (c) Pete Warden <pete@petewarden.com> http://petewarden.typepad.com/ - Mar 21st 2010
 
 Redistribution and use in source and binary forms, with or without modification, are
 permitted provided that the following conditions are met:

   1. Redistributions of source code must retain the above copyright notice, this 
      list of conditions and the following disclaimer.
   2. Redistributions in binary form must reproduce the above copyright notice, this 
      list of conditions and the following disclaimer in the documentation and/or 
      other materials provided with the distribution.
   3. The name of the author may not be used to endorse or promote products derived 
      from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES,
INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, 
BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR 
PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, 
WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) 
ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY
OF SUCH DAMAGE.
 
 */

require_once ('./config.php');
require_once ('./oauth/linkedinoauth.php');


// Returns information about the oAuth state for the current user. This includes whether the process
// has been started, if we're waiting for the user to complete the authorization page on the remote
// server, or if the user has authorized us and if so the access keys we need for the API.
// If no oAuth process has been started yet, null is returned and it's up to the client to kick it off
// and set the new information.
// This is all currently stored in session variables, but for real applications you'll probably want
// to move it into your database instead.
//
// The oAuth state is made up of the following members:
//
// request_token: The public part of the token we generated for the authorization request.
// request_token_secret: The secret part of the authorization token we generated.
// access_token: The public part of the token granting us access. Initially ''. 
// access_token_secret: The secret part of the access token. Initially ''.
// state: Where we are in the authorization process. Initially 'start', 'done' once we have access.

function get_linkedin_oauth_state()
{
    if (empty($_SESSION['linkedinoauthstate']))
        return null;
        
    $result = $_SESSION['linkedinoauthstate'];

    error_log("Found state ".print_r($result, true));

    return $result;
}

// Updates the information about the user's progress through the oAuth process.
function set_linkedin_oauth_state($state)
{
    error_log("Setting OAuth state to - ".print_r($state, true));

    $_SESSION['linkedinoauthstate'] = $state;
}

// Returns an authenticated object you can use to access the LinkedIn API
function get_linkedin_oauth_accessor()
{
    $oauthstate = get_linkedin_oauth_state();
    if ($oauthstate===null)
        return null;
    
    $accesstoken = $oauthstate['access_token'];
    $accesstokensecret = $oauthstate['access_token_secret'];

    $to = new LinkedInOAuth(
        LINKEDIN_API_KEY_PUBLIC, 
        LINKEDIN_API_KEY_PRIVATE,
        $accesstoken,
        $accesstokensecret
    );

    return $to;
}

// Returns the current page's full URL. From http://blog.taragana.com/index.php/archive/how-to-find-the-full-url-of-the-page-in-php-in-a-platform-independent-and-configuration-independent-way/
function get_current_url()
{
	$result = 'http';
	$script_name = "";
	if(isset($_SERVER['REQUEST_URI'])) 
	{
		$script_name = $_SERVER['REQUEST_URI'];
	} 
	else 
	{
		$script_name = $_SERVER['PHP_SELF'];
		if($_SERVER['QUERY_STRING']>' ') 
		{
			$script_name .=  '?'.$_SERVER['QUERY_STRING'];
		}
	}
	
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') 
	{
		$result .=  's';
	}
	$result .=  '://';
	
	if($_SERVER['SERVER_PORT']!='80')  
	{
		$result .= $_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'].$script_name;
	} 
	else 
	{
		$result .=  $_SERVER['HTTP_HOST'].$script_name;
	}

	return $result;
}

// Deals with the workflow of oAuth user authorization. At the start, there's no oAuth information and
// so it will display a link to the LinkedIn site. If the user visits that link they can authorize us,
// and then they should be redirected back to this page. There should be some access tokens passed back
// when they're redirected, we extract and store them, and then try to call the LinkedIn API using them.
function handle_linkedin_oauth()
{
	$oauthstate = get_linkedin_oauth_state();
    
    // If there's no oAuth state stored at all, then we need to initialize one with our request
    // information, ready to create a request URL.
	if (!isset($oauthstate))
	{
		error_log("No OAuth state found");

		$to = new LinkedInOAuth(LINKEDIN_API_KEY_PUBLIC, LINKEDIN_API_KEY_PRIVATE);
		
        // This call can be unreliable for some providers if their servers are under a heavy load, so
        // retry it with an increasing amount of back-off if there's a problem.
		$maxretrycount = 1;
		$retrycount = 0;
		while ($retrycount<$maxretrycount)
		{		
			$tok = $to->getRequestToken();
			if (isset($tok['oauth_token'])&&
				isset($tok['oauth_token_secret']))
				break;
			
			$retrycount += 1;
			sleep($retrycount*5);
		}
		
		$tokenpublic = $tok['oauth_token'];
		$tokenprivate = $tok['oauth_token_secret'];
		$state = 'start';
		
        // Create a new set of information, initially just containing the keys we need to make
        // the request.
		$oauthstate = array(
			'request_token' => $tokenpublic,
			'request_token_secret' => $tokenprivate,
			'access_token' => '',
			'access_token_secret' => '',
			'state' => $state
		);

		set_linkedin_oauth_state($oauthstate);
    
	}

    // If there's an 'oauth_token' in the URL parameters passed into us, and we don't already
    // have access tokens stored, this is the user being returned from the authorization page.
    // Retrieve the access tokens and store them, and set the state to 'done'.
	if (isset($_REQUEST['oauth_token'])&&
		($oauthstate['access_token']==''))
	{
        error_log('$_REQUEST: '.print_r($_REQUEST, true));
    
		$urlaccesstoken = $_REQUEST['oauth_token'];
		$urlaccessverifier = $_REQUEST['oauth_verifier'];
		error_log("Found access tokens in the URL - $urlaccesstoken, $urlaccessverifier");

		$requesttoken = $oauthstate['request_token'];
		$requesttokensecret = $oauthstate['request_token_secret'];

		error_log("Creating API with $requesttoken, $requesttokensecret");			
	
		$to = new LinkedInOAuth(
			LINKEDIN_API_KEY_PUBLIC, 
			LINKEDIN_API_KEY_PRIVATE,
			$requesttoken,
			$requesttokensecret
		);
		
		$tok = $to->getAccessToken($urlaccessverifier);
		
		$accesstoken = $tok['oauth_token'];
		$accesstokensecret = $tok['oauth_token_secret'];

		error_log("Calculated access tokens $accesstoken, $accesstokensecret");			
		
		$oauthstate['access_token'] = $accesstoken;
		$oauthstate['access_token_secret'] = $accesstokensecret;
		$oauthstate['state'] = 'done';

		set_linkedin_oauth_state($oauthstate);		
    
	}

	$state = $oauthstate['state'];
	
	if ($state=='start')
	{
        // This is either the first time the user has seen this page, or they've refreshed it before
        // they've authorized us to access their information. Either way, display a link they can
        // click that will take them to the authorization page.
        // In a real application, you'd probably have the page automatically redirect, since the
        // user has already entered their email address once for us already
		$tokenpublic = $oauthstate['request_token'];
		$to = new LinkedInOAuth(LINKEDIN_API_KEY_PUBLIC, LINKEDIN_API_KEY_PRIVATE);
		$requestlink = $to->getAuthorizeURL($tokenpublic, get_current_url());
?>
        <center><h1>Click this link to authorize access to your LinkedIn profile</h1></center>
        <br><br>
        <center><a href="<?php echo $requestlink ?>"><?php echo $requestlink?></a></center>
<?php
	}
	else
	{
        // We've been given some access tokens, so try and use them to make an API call, and
        // display the results.
        
        $accesstoken = $oauthstate['access_token'];
        $accesstokensecret = $oauthstate['access_token_secret'];

        $to = new LinkedInOAuth(
            LINKEDIN_API_KEY_PUBLIC,
            LINKEDIN_API_KEY_PRIVATE,
            $accesstoken,
            $accesstokensecret
        );
        
        $profile_result = $to->oAuthRequest('http://api.linkedin.com/v1/people/~:(id,first-name,last-name,email-address,date-of-birth,summary,picture-url,public-profile-url,phone-numbers,main-address,picture-urls::(original))');
        
        
        
        //$profile_data = simplexml_load_string($profile_result);
        
        require_once('helper.php');
        $profile_data = xml2array($profile_result);
        echo $profile_data['person']['picture-urls']['picture-url'];

        print '<h3>Your profile data</h3>';
        
        print htmlspecialchars(print_r($profile_data, true));
        
        print '<br>';
        print "\n";
        
	}
		
}

// This is important! The example code uses session variables to store the user and token information,
// so without this call nothing will work. In a real application you'll want to use a database
// instead, so that the information is stored more persistently.
session_start();

?>
<html>
<head>
<title>Example page showing how to authenticate the LinkedIn API through OAuth</title>
</head>
<body style="font-family:'lucida grande', arial;">
<div style="padding:20px;">
<?php

handle_linkedin_oauth();

?>
<br><br><br>
<center>
<i>An example demonstrating the LinkedIn API's oAuth workflow in PHP by <a href="http://petewarden.typepad.com">Pete Warden</a></i>
</center>
</div>
</body>
</html>