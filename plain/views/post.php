<form method="post" action="/post/doPost" enctype="multipart/form-data">
    <table>
        <tr>
            <td>UserId</td><td> : </td><td><input type="text" name="user_id" value="<?= isset($userid) ? $userid : "" ?>"/></td>
        </tr>
        <tr>
            <td>Content</td><td> : </td><td><input type="text" name="content"/></td>
        </tr>
        <tr>
            <td>Image</td><td> : </td><td><input type="file" name="image"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit"/></td>
        </tr>
    </table>
</form>
