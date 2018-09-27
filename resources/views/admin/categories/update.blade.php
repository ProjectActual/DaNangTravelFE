  <!-- Modal -->
  <div class="modal fade" id="myUpdate" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cập nhật Danh Mục</h4>
        </div>
        <div class="modal-body">
        <div class="form-group">
          <label>Tên danh mục</label>
          <input type="text" id="name_category_update" class="form-control" placeholder="tên danh mục ...">
        </div>
        <div class="form-group">
          <label>Link bài viết</label>
          <div class="input-group">
            <input id="link_update" class="form-control" placeholder="Dữ liệu được sinh từ tiêu đề" disabled>
            <span class="input-group-btn">
              <button id="edit_link_update" type="button" class="btn btn-success">Chỉnh sửa link bài viết</button>
              <button id="cancel_link_update" type="button" class="btn btn-default" style="display: none;">Huỷ bỏ</button>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label>Mô tả ngắn</label>
          <textarea id="description_update" class="form-control" placeholder="mô tả ..." rows="5"></textarea>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="updateModal" data-dismiss="modal">Cập nhật</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>

    </div>
  </div>
