<aside class="sidebar">
    <div class="sidebar__header">
        <h2 class="sidebar__title">
            Đơn hàng ({{ isset($quantity) ? $quantity : 0 }} sản phẩm)
        </h2>
    </div>
    <div class="sidebar__content">
        <div id="order-summary" class="order-summary order-summary--is-collapsed">
            <div class="order-summary__sections">
                <div
                    class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                    <table class="product-table">
                        <caption class="visually-hidden">Chi tiết đơn hàng</caption>
                        <thead class="product-table__header">
                            <tr>
                                <th>
                                    <span class="visually-hidden">Ảnh sản phẩm</span>
                                </th>
                                <th>
                                    <span class="visually-hidden">Mô tả</span>
                                </th>
                                <th>
                                    <span class="visually-hidden">Sổ lượng</span>
                                </th>
                                <th>
                                    <span class="visually-hidden">Đơn giá</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (isset($cart) and count($cart) > 0)

                                @foreach ($cart as $book)
                                    <tr class="product">
                                        <td class="product__image">
                                            <div class="product-thumbnail">
                                                <div class="product-thumbnail__wrapper" data-tg-static>

                                                    <img src="{{ isset($book->image) ? asset('images/book/' . $book->image) : asset('images/default.jpg') }}"
                                                        alt="" class="product-thumbnail__image">

                                                </div>
                                                <span class="product-thumbnail__quantity">{{ $book->quantity }}</span>
                                            </div>
                                        </td>
                                        <th class="product__description">
                                            <span class="product__description__name">

                                                {{ $book->book_name }}
                                            </span>


                                        </th>
                                        <td class="product__quantity visually-hidden"><em>Số lượng:</em>
                                            {{ $book->quantity }}</td>
                                        <td class="product__price">

                                            {{ number_format($book->price-3000) }}₫

                                        </td>
                                    </tr>
                                @endforeach

                            @endif



                        </tbody>
                    </table>
                </div>

                <div class="order-summary__section order-summary__section--total-lines order-summary--collapse-element"
                    data-define="{subTotalPriceText: '{{ number_format($total) }}₫'}"
                    data-tg-refresh="refreshOrderTotalPrice" id="orderSummary">
                    <table class="total-line-table">
                        <caption class="visually-hidden">Tổng giá trị</caption>
                        <thead>
                            <tr>
                                <td><span class="visually-hidden">Mô tả</span></td>
                                <td><span class="visually-hidden">Giá tiền</span></td>
                            </tr>
                        </thead>
                        <tbody class="total-line-table__tbody">
                            <tr class="total-line total-line--subtotal">
                                <th class="total-line__name">
                                    Tạm tính
                                </th>
                                <td class="total-line__price">{{ number_format($total) }}₫</td>
                            </tr>

                            <tr class="total-line total-line--shipping-fee">
                                <th class="total-line__name">
                                    Phí vận chuyển
                                </th>
                                <td class="total-line__price">0₫
                                </td>
                            </tr>

                        </tbody>
                        <tfoot class="total-line-table__footer">
                            <tr class="total-line payment-due">
                                <th class="total-line__name">
                                    <span class="payment-due__label-total">
                                        Tổng cộng
                                    </span>
                                </th>
                                <td class="total-line__price">
                                    <span class="payment-due__price" data-bind="getTextTotalPrice()"></span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="order-summary__nav field__input-btn-wrapper hide-on-mobile layout-flex--row-reverse">
                    <button type="submit" class="btn btn-checkout spinner" name="redirect">
                        <span class="spinner-label">ĐẶT HÀNG</span>

                    </button>


                    <a href="{{ route('GioHangView') }}" class="previous-link">
                        <i class="previous-link__arrow">❮</i>
                        <span class="previous-link__content">Quay về giỏ hàng</span>
                    </a>

                </div>
                

                <div id="common-alert-sidebar" data-tg-refresh="refreshError">



                </div>
                
            </div>
        </div>
    </div>
</aside>
