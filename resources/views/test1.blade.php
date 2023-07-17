<form action="<?php echo route('user.create')?>" method="POST">
    <input type="text" placeholder="nhập username" name="username">
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <button type="submit">Submit</button>

</form>
