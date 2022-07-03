<div class="modal" tabindex="-1" role="dialog" id="ModalOrderView">
    <div class="modal-dialog" role="document" style="width: 500px;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Khách hàng <span class="customerOrder"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            <table class="table table-dark" style="width: 100%;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên sách</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá tiền</th>
                    <th scope="col">Tổng tiền</th>
                  </tr>
                </thead>
                <tbody id="order">
                 
                 
                </tbody>
                <tfoot>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>

                  <td class="totals">

                  </td>
                </tfoot>
              </table>
          </p>
        </div>
        <div class="modal-footer">
         
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>