@include('Admin.assets.header')



<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="container">
        <div class="row layout-top-spacing">

            <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            @if (\Illuminate\Support\Facades\Session::has('done'))
                                <div class="alert alert-success" role="alert">
                                    {{ \Illuminate\Support\Facades\Session::get('done') }}
                                </div>
                            @endif
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Add Skill</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form method="post" action="{{ route('admin.skill.store') }}">
                            @csrf
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Name</span>
                                </div>
                                <input type="text" class="form-control" name="name"
                                    placeholder="Course Name" aria-label="Course Name">
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Price</span>
                                </div>
                                <input type="number" class="form-control" name="price" placeholder="Price"
                                    aria-label="Price">
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Start Date</span>
                                </div>
                                <input type="date" class="form-control" name="start_date" placeholder="Start Date"
                                    aria-label="Start Date">
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">End Date</span>
                                </div>
                                <input type="date" class="form-control" name="end_date" placeholder="End Date"
                                    aria-label="End Date">
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Category</span>
                                </div>

                                <select name="skill_category_id" class="btn btn-warning dropdown-toggle ml-2">
                                    @foreach ($skillCategories as $skillCategory)
                                        <option value="{{ $skillCategory->id }}">{{ $skillCategory->name }}</option>
                                    @endforeach
                                </select>

                            </div>



                            <div class="input-group mb-4">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
<!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->

@include('Admin.assets.footer')
