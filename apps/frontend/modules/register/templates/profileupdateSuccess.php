<article>
  <div>    	
      

    <form action="<?php echo url_for('register/profileupdate?id='.$form->getObject()->getId());?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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

		
       
    </div>
</article>