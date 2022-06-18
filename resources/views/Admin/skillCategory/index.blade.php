@include('Admin.assets.header')

<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
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
                <div class="widget-content widget-content-area br-6">

                    <table id="zero-config" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skillsCategories as $skillCategory)
                                <tr>
                                    <td>{{ $skillCategory->name }}</td>
                                    <td class="text-center">

                                        <div class="dropdown custom-dropdown">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-horizontal">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                {{-- <form method="post"
                                                    action="{{ route('admin.skill.category.delete') }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id"
                                                        value="{{ $skillCategory->id }}">
                                                    <button class="dropdown-item" type="submit">Delete</button>
                                                </form> --}}
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.skill.category.edit', [$skillCategory->id]) }}">Edit</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>

                    </table>
                    <div>
                        <a href="{{ route('admin.skill.category.create') }}" class="btn btn-primary btn-rounded"> Add
                            New
                            One</a>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>

@include('Admin.assets.footer')
