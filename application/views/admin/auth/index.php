

<div id="infoMessage"><?php echo $message;?></div>

<p class="pull-right">
	<a href="<?php print $this->url->controller_url('create_user'); ?>" class="btn btn-outline btn-default">
		ユーザー作成
	</a>
	<a href="<?php print $this->url->controller_url('create_group'); ?>" class="btn btn-outline btn-default">
		グループ作成
	</a>
</p>

<table id="user_list" class="table table-striped">
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
			<td class="to_user_detail">
				<a href="<?php print $this->url->controller_url("edit_user/".$user->id); ?>">
					<?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?>
				</a>
			</td>
			<td class="to_user_detail">
				<a href="<?php print $this->url->controller_url("edit_user/".$user->id); ?>">
					<?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?>
				</a>
			</td>
			<td class="to_user_detail">
				<a href="<?php print $this->url->controller_url("edit_user/".$user->id); ?>">
					<?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?>
				</a>
			</td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("admin/auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
				<?php endforeach?>
			</td>
			<td>
				<?php echo ($user->active) ? anchor("admin/auth/deactivate/".$user->id, '有効') : anchor("admin/auth/activate/". $user->id, '無効');?>
			</td>
		</tr>
	<?php endforeach;?>
</table>
<p><?php echo anchor('admin/auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('admin/auth/create_group', lang('index_create_group_link'))?></p>