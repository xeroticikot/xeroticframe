<?php $__env->startSection('content'); ?>
    <h1>Users</h1>
    <table>
        <thead>
        <tr>
            <td>Username</td>
            <td>Password</td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($users as $user){
            echo '<tr><td>'.$user->username.'</td><td>'.$user->password.'</td></tr>';
        }
        ?>
        </tbody>
    </table>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>