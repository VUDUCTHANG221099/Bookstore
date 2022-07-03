<div class="col col--two">
    <section class="section">
      <div class="section__header">
        <div class="layout-flex">
          <h2 class="section__title layout-flex__item layout-flex__item--stretch">
            <i class="fa fa-id-card-o fa-lg section__title--icon hide-on-desktop"></i>

            Thông tin nhận hàng

          </h2>


          


        </div>
      </div>
      <div class="section__content">
        <div class="fieldset">

          




          <div class="field field--show-floating-label">
            <input id="email" type="hidden" class="field__input" data-bind="email" name="email"
            value="{{$user->email}}">
            <div class="field__input-wrapper">
              <label for="email" class="field__label">
                Email
              </label>
              <input id="email" type="email" class="field__input" data-bind="email" name="email" title="{{$user->email}}"
                value="{{$user->email}}" disabled>
            </div>
          </div>



          <div class="field " data-bind-class="{'field--show-floating-label': fullname}">
            <div class="field__input-wrapper">
              <label for="fullname" class="field__label">Họ và tên</label>
              <input name="fullname" id="fullname" type="text" class="field__input"
                data-bind="fullname" value="{{$user->full_name}}" disabled title="{{$user->full_name}}"
                <input name="fullname" id="fullname" type="hidden" class="field__input"
                data-bind="fullname" value="{{$user->full_name}}">
            </div>

          </div>

          <div class="field " data-bind-class="{'field--show-floating-label': phone}">
            <div class="field__input-wrapper">
              <label for="phone" class="field__label">
                Số điện thoại
              </label>
              <input name="phone" id="phone" type="tel" class="field__input"
                data-bind="phone" value="{{$customer->phone}}" disabled title="{{$customer->phone}}">
                <input name="phone" id="phone" type="hidden" class="field__input"
                data-bind="phone" value="{{$customer->phone}}">
            </div>

          </div>


         


          <div class="field field--show-floating-label ">
            <div class="field__input-wrapper field__input-wrapper--select2">
              <label for="province" class="field__label">Tỉnh thành</label>
              <select name="province" id="province" size="1" type="text"
                class="field__input field__input--select"  value=""
                data-address-type="province" disabled>

                <option value="{{$province->id}}">{{$province->name}}</option>
               
              
              </select>
              <select name="province" style="display: none">

                <option value="{{$province->id}}">{{$province->name}}</option>

              </select>
            </div>

          </div>

          <div class="field field--show-floating-label ">
            <div class="field__input-wrapper field__input-wrapper--select2">
              <label for="district" class="field__label">
                Quận huyện
              </label>
              <select name="district" id="district" size="1" type="text"
                class="field__input field__input--select" value="" 
                data-address-type="district"  disabled>
                <option value="{{$district->id}}">{{$district->name}}</option>

              </select>
              <select name="district" style="display: none">

                <option value="{{$district->id}}">{{$district->name}}</option>

              </select>
            </div>

          </div>
          <div class="field field--show-floating-label ">
            <div class="field__input-wrapper field__input-wrapper--select2">
              <label for="ward" class="field__label">
                Xã phường
              </label>
              <select name="ward" id="ward" size="1" type="text"
                class=" " value="" 
                data-address-type="ward"  disabled>
                <option value="{{$ward->id}}">{{$ward->name}}</option>

              </select>
              <select name="ward" style="display: none">

                <option value="{{$ward->id}}">{{$ward->name}}</option>

              </select>
            </div>

          </div>

          <div class="field " data-bind-class="{'field--show-floating-label': address}">
            <div class="field__input-wrapper">
              <label for="address" class="field__label">
                Địa chỉ chi tiết
              </label>
          <textarea class="field__input" data-bind="address" disabled>{{$customer->address}}</textarea>

              {{-- <input name="address" id="address" type="text" class="field__input" disabled
                data-bind="address" value="{{$customer->address}}"> --}}
                <input name="address" id="address" type="hidden" class="field__input"
                data-bind="address" value="{{$customer->address}}">
            </div>

          </div>


        </div>
      </div>
    </section>

    <div class="fieldset" style="display: none">
      <h3 class="visually-hidden">Ghi chú</h3>
      <div class="field " data-bind-class="{'field--show-floating-label': note}">
        <div class="field__input-wrapper">
          <label for="note" class="field__label">
            Ghi chú (tùy chọn)
          </label>
          <textarea name="note" id="note" type="text" class="field__input" data-bind="note"></textarea>
        </div>

      </div>
    </div>

  </div>