<div class="sf_admin_list">
  <?php if (!$pager->getNbResults()): ?>
    <p><?php echo __('No result', array(), 'sf_admin') ?></p>
  <?php else: ?>
    <table cellspacing="0">
      <thead>
        <tr>
          <th id="sf_admin_list_batch_actions"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
          <?php include_partial('user/list_th_tabular', array('sort' => $sort)) ?>
          <th id="sf_admin_list_th_actions"><?php echo __('Actions', array(), 'sf_admin') ?></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="16">
            <?php if ($pager->haveToPaginate()): ?>
              <?php include_partial('user/pagination', array('pager' => $pager)) ?>
            <?php endif; ?>
          </th>
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($pager->getResults() as $i => $user): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
				<?php $profile = ProfileTable::getInstance()->findOneBy('id', $user->getId()); ?>
          <tr class="sf_admin_row <?php echo $odd ?>">
            <?php include_partial('user/list_td_batch_actions', array('user' => $user, 'helper' => $helper)) ?>
            <?php include_partial('user/list_td_tabular', array('user' => $user, 'profile' => $profile)) ?>
            <?php include_partial('user/list_td_actions', array('user' => $user, 'helper' => $helper)) ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
<script type="text/javascript">
/* <![CDATA[ */
function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
}
/* ]]> */
</script>
