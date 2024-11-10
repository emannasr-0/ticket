<ul>
    
    <?php if(count($messages) > 0): ?>
        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!empty($message['statusString'])): ?>
            <?php if($message['statusString'] == 'SENT'): ?>
                <li class="left" style="border-radius: 35px; margin-bottom: 5px; padding: 10px;">
                    <?php if(!empty($message['text']) || !empty($message['finalText']) ): ?>
                    <?php echo nl2br(e($message['text'] ?? $message['finalText'] )); ?>

                    <?php endif; ?>
                </li>
            <?php else: ?>
                <li class="right" style="border-radius: 35px; margin-bottom: 5px; padding: 10px;">
                   <?php if(!empty($message['text']) || !empty($message['finalText'])): ?>
                    <?php echo nl2br(e($message['text'] ?? $message['finalText'] )); ?>

                    <?php endif; ?>
                </li>
            <?php endif; ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <li>No Message Found..!</li>
    <?php endif; ?>
</ul><?php /**PATH /home/anasacad/support.anasacademy.uk/resources/views/admin/chats/message.blade.php ENDPATH**/ ?>