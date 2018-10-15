  <!-- Modal -->
  <div class="modal fade" id="myUpdate" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cập nhật cộng tác viên</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
              <label class="custom-control-label" for="admin_active1">Thực hiện tác vụ</label>
              <select name="active" class="form-control" id="active" disabled>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label>Lý do</label>
            <textarea id="reason" placeholder="Lý do thực hiện tác vụ ..." class="form-control" rows="4"></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="updateModal" data-dismiss="modal">Gửi yêu cầu</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>

    </div>
  </div>
