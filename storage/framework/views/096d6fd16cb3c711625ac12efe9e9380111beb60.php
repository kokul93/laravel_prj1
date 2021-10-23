

<?php $__env->startSection('content'); ?>
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
       <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Create Post</h1>
                </div>
                <div class="form-group row">
                    <label for="content" class="col-form-label ">Type Your Post here</label>
            
                        <input id="content" type="text" 
                        class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="content" 
                        value="<?php echo e(old('content')); ?>" r
                        equired autocomplete="content" 
                        autofocus>
            
                        <?php $__errorArgs = ['content'];
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
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <button class="btn btn-primary">Create Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\PHP\Laravel\Project_1\myProject2\resources\views/post/create.blade.php ENDPATH**/ ?>