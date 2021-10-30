<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="<?php echo e($user->profile->profileimage()); ?>" style="height:120px;" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                    <h1><?php echo e($user->username); ?></h1>                  
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',$user->profile)): ?>
            <a href="<?php echo e($user->id); ?>/edit"><strong>Edit Profile</strong></a>
            <?php endif; ?>
            
           <?php if($user->posts): ?>
                <div class="d-flex">
                    <div class="pr-4"><strong><?php echo e($user->posts->count()); ?></strong> posts</div>
                </div>
                <div class="pt-3 font-weight-bold"><?php echo e($user->profile->title); ?></div>
                <div><?php echo e($user->profile->description); ?></div>
                <div class="font-weight-bold"><a href="#"><?php echo e($user->profile->url??"N/A"); ?></a></div>
                </div>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',$user->profile)): ?>
            <div class="container pl-2 pt-5 pb-3">
                <form action="/p" enctype="multipart/form-data" method="post" >
                    <?php echo csrf_field(); ?>
                            <!-- <div class="col-8 offset-2"> -->     
                        <div class="form-group pl-1 row">
                            <!-- <label for="content" class="col-form-label ">Type Your Post here</label> -->
                    
                                <input id="content" type="text" 
                                class="form-control "
                                name="content" 
                                value="<?php echo e(old('content')); ?>" r
                                equired autocomplete="content" 
                                autofocus placeholder="Enter What you feel today!!!">
                    
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
                        <!-- </div> -->
                        </div>
                        
                        <div class="row">
                            <!-- <div class="col-8 offset-2"> -->
                                <div class="form-group pl-4 row">
                                    <button class="btn btn-primary">Create Post</button>
                                </div>
                            <!-- </div> -->
                        </div>
                    </form>
            </div>
        <?php endif; ?>
        <?php $__currentLoopData = $userPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <div class="card pb-2 pt-2">
            <div class="container justify-content-between align-items-baseline">         
                <h3><?php echo e($post->content); ?></h3>
            </div>
            <div align="right">                               
                Posted on <?php echo e($post->created_at); ?>

            </div>
            <?php if($post->comments->count()!=0): ?>
                <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card justify-content-between align-items-baseline pt-1 pb-2">         
                   <div> 
                       <?php echo e($comment->context); ?> 
                    </div>
                    <div class="pl-0.5"align="right">
                        <img src="<?php echo e(\App\Models\User::find($comment->user_id)->profile->profileimage()); ?>" style="height:20px;" class="rounded-circle">
                            <a href="<?php echo e(url('/profile/'.$comment->user_id)); ?> "><?php echo e(\App\Models\User::find($comment->user_id)->username); ?></a> commented on <?php echo e($comment->created_at); ?>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                
            <?php endif; ?>
            <form action="/cmt/<?php echo e($post->id); ?>" enctype="multipart/form-data" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
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
                <button class="btn btn-outline-danger" style="font-size:x-small;">Add comment</button>
            </form>
        </div>
        <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php echo e($userPosts->links()); ?>

            </ul>
            <style>
                .w-5{
                    display: none;
                }
            </style>
        </nav>
        <?php endif; ?>       
    </div>    

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\PHP\Laravel\Project_1\myProject2\resources\views/profile/index.blade.php ENDPATH**/ ?>