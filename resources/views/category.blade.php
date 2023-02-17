<x-app>
    {{-- category --}}
   <section class="d-flex justify-content-center flex-wrap">
       @foreach ($categories as $category)
           <div class="card mx-3 my-3 font-weight-bold" style="width: 18rem;">
               {{$category->name}}
                   <img src="https://api.lorem.space/image?w=150&h=180&hash=8B7BCDC2" class="card-img-top" alt="producto">
                <div class="card-body">
                   <h5 class="card-title">{{$category->name}}</h5>

                   <form action="{{ route('home') }}" method="GET">
                       {{ csrf_field() }}
                       <div class="card-footer" style="background-color: #D9D7DA;">
                             <div class="row">
                               <button class="btn btn-info btn-sm" class="tooltip-test" title="watch category">
                                   <i class="fa fa-shopping-cart font-weight-bold"></i> Ver categoria
                               </button>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       @endforeach
   </section>
</x-app>

