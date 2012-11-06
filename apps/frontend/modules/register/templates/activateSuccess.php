<article>
  <div id="content">    	
      
    <?php
    if ($is_error == 0) { ?>
		<h2>Thank you for registering an account!</h2>
		<span>
		Please take a moment to fill out your profile. It's a handy tool for connecting with others.
		Or you could check out <a href="<?php url_for('events/upcoming')?>">upcoming events </a>.
		</span>
		
		<h3>Edit your Network After Work profile.</h3>
    
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

		<?php } else { echo "<h2>Activation code is incorrect.</h2>"; }?>
		
       
    </div>
</article>