<style>
  .box.box-default {
    max-width: 90%;
    margin: 40px auto 0;
    width: 550px;
  }

  .control-label {
    text-align: right;
  }

  .admin_form {
    padding: 10px 0 20px;
  }

  .admin_form_txt {
    border: none;
  }

  .admin_form_input {
    width: 100%;
  }

  .textarea {
    width: 100%;
  }

  .form-group {
    margin: 10px;
  }

  .admin_form_btn {
    text-align: center;
    display: block;
    margin: 10px auto 0;
  }
</style>

<div class="col-md-12 align-items-center">
  <div class="col-md-12 align-items-center">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">メール作成</h3>
      </div>
      <form method="POST" action="/admin/users/sendmail" class="admin_form">
        @csrf
        <div class="box-body fields-group">
          <div class="col-sm-12 align-items-center">
            <div class="form-group">
              <label for="parent_id" class="col-sm-3 control-label">宛先 ：</label>
              <div class="col-sm-8">
                <input type="text" id="name" name="name" class="admin_form_txt" value="ユーザー全員">
              </div>
            </div>
          </div>
          <div class="col-sm-12 align-items-center">
            <div class="form-group">
              <label for="parent_id" class="col-sm-3 control-label">タイトル ：</label>
              <div class="col-sm-8">
                <input type="text" id="name" name="name" class="col-sm-12">
              </div>
            </div>
          </div>
          <div class="col-sm-12 align-items-center">
            <div class="form-group">
              <label for="parent_id" class="col-sm-3 control-label">本文 ：</label>
              <div class="col-sm-8">
                <textarea name="" id="" rows="10" class="col-sm-12"></textarea>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="admin_form_btn">送信</button>
      </form>
    </div>
  </div>
</div>