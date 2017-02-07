<?php
/**
 * This file is part of the TaskBreaker WordPress Plugin package.
 *
 * (c) Joseph Gabito <joseph@useissuestabinstead.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package TaskBreaker\TaskBreakerCore
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}
?>

<?php $user_access = TaskBreakerCT::get_instance(); ?>
<?php $__post = TaskBreaker::get_post(); ?>
<?php $core = new TaskBreakerCore(); ?>

<div class="form-wrap">

	<?php if ( $user_access->can_add_task( $__post->ID ) ) { ?>

		<div id="task_breaker-add-task-message" class="task_breaker-notifier"></div>

		<!-- Task Title -->
		<div class="task_breaker-form-field">

			<input placeholder="<?php esc_attr_e( 'Task Summary', 'task_breaker' ); ?>" type="text" id="task_breakerTaskTitle" maxlength="160" name="title" class="widefat"/>

		</div>

		<!-- Task User Assigned -->
		<div class="task_breaker-form-field">
			<select multiple id="task-user-assigned" class="task-breaker-select2"></select>
		</div>

		<!-- Task Description -->
		<div class="task_breaker-form-field">

		<?php 
			$args = array(
				'teeny' => true,
				'editor_height' => 100,
				'media_buttons' => false,
				'quicktags' => false,
			);
		?>

		<?php echo wp_editor( $content = null, $editor_id = 'task_breakerTaskDescription', $args ); ?>

		</div>

		<!-- priority -->
		<div class="task_breaker-form-field">
			<label for="task_breaker-task-priority-select">
				<strong>
					<?php _e( 'Priority:', 'task_breaker' ); ?> 
				</strong>
				<?php $core->task_priority_select(); ?>
			</label>
		</div>
		<!--end priority-->

		<div class="task_breaker-form-field">
			<label for="task_breaker-task-priority-select">
				<strong>
					<?php _e( 'File Attachment:', 'task_breaker' ); ?> 
				</strong>
				<div class="task-breaker-form-file-attachment">
					<input type="file" name="file" id="task-breaker-form-file-attachment-field" />
				</div>
				<div id="tb-file-attachment-progress">
					<div id="tb-file-attachment-progress-movable"></div>
				</div>
			</label>
			<input type="hidden" name="taskbreaker-file-attachment-field" id="taskbreaker-file-attachment-field" value="" />
		</div>

		<div class="task_breaker-form-field ie-fallback hidden">
			<label for="task_breaker-task-priority-select">
			Asynchronous file upload is not supported with your browser. Please use IE 10 and above.
			</label>
		</div>
		

		<div class="task_breaker-form-field">
			<button id="task_breaker-submit-btn" class="button button-primary button-large" style="float:right">
				<?php _e( 'Save Task', 'dunhakdis' ); ?>
			</button>
			<div style="clear:both"></div>
		</div>
	<?php } else { ?>
		<div class="task-breaker-message danger">
			<?php esc_html_e( 'Ops! Only group administrator or group moderators can add tasks to this group project.', 'task-breaker' ); ?>
		</div>
	<?php } ?>
</div>
