  <!-- Modal -->
  <div class="modal fade" id="myUpdate" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Phê Duyệt Cộng Tác Viên</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="admin_active1" name="admin_active" value="YES" class="custom-control-input">
              <label class="custom-control-label" for="admin_active1">Duyệt cộng tác viên</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="admin_active2" name="admin_active" value="NO" class="custom-control-input">
              <label class="custom-control-label" for="admin_active2">Không Duyệt cộng tác viên</label>
            </div>
          </div>

        <div class="form-group">
          <label>Lý do</label>
          <textarea id="reason" placeholder="Lý do duyệt/ không duyệt(có thể trống) ..." class="form-control" rows="4"></textarea>
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="updateModal" data-dismiss="modal">Gửi yêu cầu</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>

    </div>
  </div>
