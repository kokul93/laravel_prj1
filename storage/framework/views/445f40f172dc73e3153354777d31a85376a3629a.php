<form action="/cmt" enctype="form-data" method="post">
    <?php echo csrf_field(); ?>
    <div class="form-group">
      <input id="context" type="text" class="form-control" <?php $__errorArgs = ['context'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
      name="context" 
      value="<?php echo e(old('context')); ?>" r
      equired autocomplete="context" 
      autofocus
      style="height:25px;" placeholder="Enter Your Comment">
      <?php $__errorArgs = ['context'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <button class="btn btn-outline-danger" style="font-size:x-small;">Add comment</button>
</form>
</div><?php /**PATH F:\PHP\Laravel\Project_1\myProject2\resources\views/post/test.blade.php ENDPATH**/ ?>