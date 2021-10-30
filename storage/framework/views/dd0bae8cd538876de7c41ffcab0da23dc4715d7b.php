<?php $__env->startSection('content'); ?>


<div class="container">

<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card pb-2 pt-2 pr-1">

                <div class="container align-items-baseline pt-2"> 
                    <div class="row pl-2 pb-3" align="left">
            
                            <img src="<?php echo e(\App\Models\User::find($post->user_id)->profile->profileimage()); ?>" style="height:25px;" class="rounded-circle">
                        
                            <h5> <a href="<?php echo e(url('/profile/'.$post->user_id)); ?> "><?php echo e(\App\Models\User::find($post->user_id)->username); ?></a></h5>
                    </div>
                    <div class="row pl-2 pt-2">
                        <h3><?php echo e($post->content); ?></h3>
                    </div>
                    
                </div>
                <div align="right" class="pr-2 pb-1">                               
                    Posted on <?php echo e($post->created_at); ?>

                </div>
                <?php if($post->comments->count()!=0): ?>
                    <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="pl-2 pb-2">
                        <div class="card justify-content-between align-items-baseline pl-1">         
                        <div> 
                            <?php echo e($comment->context); ?> 
                            </div>
                            <div class="row pl-3 " align="right">
                                <div class="tab">
                                    <img src="<?php echo e(\App\Models\User::find($comment->user_id)->profile->profileimage()); ?>" style="height:20px;" class="rounded-circle"> 
                                    <a href="<?php echo e(url('/profile/'.$comment->user_id)); ?> "><?php echo e(\App\Models\User::find($comment->user_id)->username); ?></a> commented on <?php echo e($comment->created_at); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    
                <?php endif; ?>
                <br>

                <form action="/cmt/<?php echo e($post->id); ?>" enctype="multipart/form-data" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group pl-2">
                  <input id="context" type="text" 
                        class="form-control <?php $__errorArgs = ['context'];
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
                        autofocus style="height:25px;" placeholder="Enter Your Comment">
            
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
                <div class="pl-2">
                <button class="btn btn-outline-danger" style="font-size:x-small;">Add comment</button>
                </div>
                </form>
    </div>
    

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php echo e($posts->links()); ?>

        </ul>
        <style>
        .w-5{
            display: none;
        }
        </style>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\PHP\Laravel\Project_1\myProject2\resources\views/main.blade.php ENDPATH**/ ?>