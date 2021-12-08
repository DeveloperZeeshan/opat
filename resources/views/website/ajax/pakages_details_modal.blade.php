<div class="modal fade" id="package_detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row mb-12 text-center my-price-table">
            <div class="card col-lg-12 col-md-12 mb-12 price-card">
                <div class="package-card-wrapper">
                   <div class="card-header">
                      <h2 class="pt-3">{{$package->name}}</h2>
                   </div>
                   <div class="card-body text-left">
                      <p class="text-left">
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                         do eiusmod.!
                      </p>
                      <p>
                         <i class="fas fa-check pr-2"></i> Lorem ipsum dolor sit amet
                      </p>
                      <p>
                         <i class="fas fa-check pr-2"></i> Lorem ipsum dolor sit amet
                      </p>
                      <p>
                         <i class="fas fa-check pr-2"></i> Lorem ipsum dolor sit amet
                      </p>
                      <p>
                         <i class="fas fa-check pr-2"></i> Lorem ipsum dolor sit amet
                      </p>
                      <p>
                         <i class="fas fa-check pr-2"></i> Lorem ipsum dolor sit amet
                      </p>
                   </div>
                   <div class="price-row">
                      <div class="column-1">
                         <h5>PRICE USD</h5>
                      </div>
                      <div class="column-1">
                         <h2>${{$package->price}}</h2>
                      </div>
                      <div class="column-2">
                         <!-- <a class="learn-more-btn b-now"></button> -->
                         <div class="learn-more-btn-div">
                            <a class="btn learn-btn confirm_package" style="cursor: pointer;"> Confirm</a>
                         </div>
                      </div>
                   </div>
                </div>  
             </div> 
         </div>
      </div>
    </div>
  </div>
</div>