<!DOCTYPE html>
<html>
<head>
    <title>Students - <?php echo e($classSession->title); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">

<h2 class="text-3xl font-bold mb-6">
    Students - <?php echo e($classSession->title); ?>

</h2>

<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 border">ID</th>
                <th class="p-3 border">Name</th>
                <th class="p-3 border">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-gray-100 even:bg-gray-50">
                    <td class="p-3 border"><?php echo e($student->student_id); ?></td>
                    <td class="p-3 border font-medium"><?php echo e($student->full_name); ?></td>
                    <td class="p-3 border"><?php echo e($student->email); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td class="p-3 border text-center" colspan="3">No students found</td>
                </tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html><?php /**PATH C:\xampp82\htdocs\lms\resources\views/filament/class-students.blade.php ENDPATH**/ ?>