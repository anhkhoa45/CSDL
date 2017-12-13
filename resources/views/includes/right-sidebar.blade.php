<div class="col-sm-12 col-md-4 col-lg-3">
    <div class="irs-sb-courses">
        <h3 class="irs-sblc-title text-center">Courses</h3>
        <ul class="list-unstyled irs-sbc-list">
            @php
                $categories = \App\CourseCategory::all();
            @endphp
            <li class="active"><a href="{{route('all-course')}}"><span class="flaticon-arrows-3"></span> All Courses</a></li>
            @foreach($categories as $category)
            <li><a href="{{route('category', ['id' => $category->id])}}"><span class="flaticon-arrows-3"></span> {{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="irs-sb-lcourses">
        <h3 class="irs-sbc-title text-center">Latest Courses</h3>
        <div class="irs-sblc-pack">
            <div class="irs-lc-thumb">
                <img class="img-responsive" src="images/courses/s7.png" alt="s7.png">
                <div class="irs-sblc-overlay"></div>
            </div>
            <div class="irs-sblc-details">
                <h5>Chemical Engineering & Best Technology</h5>
                <p class="irs-sblc-price text-thm2">$49.99</p>
            </div>
        </div>
        <div class="irs-sblc-pack">
            <div class="irs-lc-thumb">
                <img class="img-responsive" src="images/courses/s8.png" alt="s8.png">
                <div class="irs-sblc-overlay"></div>
            </div>
            <div class="irs-sblc-details">
                <h5>Electrical & Electronic Engineering</h5>
                <p class="irs-sblc-price text-thm2">$49.99</p>
            </div>
        </div>
        <div class="irs-sblc-pack">
            <div class="irs-lc-thumb">
                <img class="img-responsive" src="images/courses/s9.png" alt="s9.png">
                <div class="irs-sblc-overlay"></div>
            </div>
            <div class="irs-sblc-details">
                <h5>Geography Environmental Sciences</h5>
                <p class="irs-sblc-price text-thm2">$49.99</p>
            </div>
        </div>
    </div>
    <div class="irs-sb-bcome-teacher">
        <div class="irs-sb-bct-details text-center">
            <h3>Become an Instructor Today!</h3>
            <a href="#" class="btn btn-lg irs-btn-thm2"> Read More</a>
        </div>
    </div>
    <div class="irs-sb-lcourses">
        <h3 class="irs-sbc-title text-center">Latest News</h3>
        <div class="irs-sblc-pack">
            <div class="irs-lc-thumb">
                <img class="img-responsive" src="images/blog/xs4.png" alt="xs4.png">
                <div class="irs-sblc-overlay"></div>
            </div>
            <div class="irs-sblc-details">
                <h5>Social benefits: universal or targeted?</h5>
                <p class="irs-sblc-price text-thm2"><span class="text-thm2 flaticon-clock"></span> 20/02/2017</p>
            </div>
        </div>
        <div class="irs-sblc-pack">
            <div class="irs-lc-thumb">
                <img class="img-responsive" src="images/blog/xs5.png" alt="xs4.png">
                <div class="irs-sblc-overlay"></div>
            </div>
            <div class="irs-sblc-details">
                <h5>Educational integration: religion and society</h5>
                <p class="irs-sblc-price text-thm2"><span class="text-thm2 flaticon-clock"></span> 19/02/2017</p>
            </div>
        </div>
        <div class="irs-sblc-pack">
            <div class="irs-lc-thumb">
                <img class="img-responsive" src="images/blog/xs6.png" alt="xs4.png">
                <div class="irs-sblc-overlay"></div>
            </div>
            <div class="irs-sblc-details">
                <h5>The importance of good (politic) communicate</h5>
                <p class="irs-sblc-price text-thm2"><span class="text-thm2 flaticon-clock"></span> 18/02/2017</p>
            </div>
        </div>
    </div>
</div>