<article>
  <div id="content">    	
      
    <?php
    if ($is_error == 0) { ?>
		<h3>Thank you for registering an account!</h3>
		Please take a moment to fill out your profile. It's a handy tool for connecting with others.
		Or you could check out <a href="<?php url_for('events/upcoming')?>">upcoming events </a>.
		
		Edit your Network After Work profile.
    
    <form action="<?php echo url_for('register/profileupdate?id='.$uid);?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
			<input type="hidden" name="sf_method" value="put" />
			<table>
				<tfoot>
				<tr>
					<td colspan="2">
						<input type="submit" value="Save" />
					</td>
				</tr>
				</tfoot>
				<tbody>
					<?php echo $form ?>
				</tbody>
			</table>
		</form>

		<?php } else { echo "<p>Activation code is incorrect.</p>"; }?>
		
       
    </div>
</article>