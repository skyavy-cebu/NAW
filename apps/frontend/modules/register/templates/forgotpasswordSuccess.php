<div id="content">
 
	<h2>Forgot Password</h2>    
	    
	<?php echo $form->renderFormTag(url_for('register/forgotpassword'), array('id' => 'forgotpassword'))?>      
	<?php echo $form['email']->renderError()?>      
	<?php echo $form['email']->render()?>      
	<?php echo $form->renderHiddenFields()?>      
	<?php echo tag('input', array('type' => 'submit', 'value' => 'Submit'))?>    
	</form>  
	</div>
