
<div class="row">
    <!-- Modal -->
    <div class="modal fade bs-example-modal-sm in" id="dataModal" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg" style="min-width: 800px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="btnCloseModal">&times;</button>
                    <h4 class="modal-title text-center" id="modalHeader">COUPON</h4>
                </div>

                <div class="modal-body coupon-form-area">


                    @include('coupons.form')


                </div>

            </div>
        </div>
    </div>
</div>

