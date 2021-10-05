<form action="<?=Route::url('index', 'update')?>" method="post">
    <label>Note
        <input type="text" name="note" value="<?=$_REQUEST['text']?>" autofocus>
    </label>
    <input type="hidden" name = "id" value="<?=$_REQUEST['id']?>">
    <input type="submit" value="Save">
</form>
