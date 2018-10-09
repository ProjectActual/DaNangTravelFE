  <!-- Modal -->
  <div class="modal fade" id="block" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Lock/UnLock tài khoản</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="is_block1" name="is_block" value="NO" class="custom-control-input is_block">
              <label class="custom-control-label" for="is_block1">Mở khóa tài khoản</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="is_block2" name="is_block" value="YES" class="custom-control-input is_block">
              <label class="custom-control-label" for="is_block2">Vô hiệu hóa tài khoản</label>
            </div>
          </div>

        <div class="form-group">
          <label>Lý do</label>
          <textarea id="reasonBlock" placeholder="Lý unlock/block (có thể trống) ..." class="form-control" rows="4"></textarea>
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="blockModal" data-dismiss="modal">Gửi yêu cầu</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>

    </div>
  </div>
