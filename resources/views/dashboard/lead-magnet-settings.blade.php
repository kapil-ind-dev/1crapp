@include('front.layouts.user-header')
@php 
use Carbon\Carbon;
@endphp
	<section class="dash_board_pages mt">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
                    @include('dashboard.includes.sidebar')
				</div>
                <div class="col-lg-9">
                    <div class="crent_lt_ares">
                        <div class="lnk_s_bntt d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Menu List</h4>
                        
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#addCommunityModal">
                                + Add Menu
                            </a>
                        </div>
                    </div>
                    <div class="tbl_liststs">
                        
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Parent Menu</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                    
                                <tbody>
                                    @foreach($menues as $index => $menu)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>@if($menu->icon)<i class="fa {{ $menu->icon }}"></i>@endif {{ $menu->title }}</td>
                                        <td>{{ optional($menu->parent)->title }}</td>
                                        <td>{{ ($menu->type == 1)?'Header':'Footer' }}</td>
                                        <td>{{ $menu->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            @if($menu->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="javascript:void(0);" onclick='editCommunity(@json($menu))'  class="text-info"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('lead-magnet-settings.delete', $menu->id) }}" class="text-danger" onclick="return confirm('Are you sure you want to delete this Menu?');"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <hr>
                            </table>
                        </div>
                    
                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center mt-3">
                            {{ $menues->links() }}
                        </div>
                    </div>
                    <br><hr><br>
                    <h4 class="mb-0">Layout Settings</h4>
                    <br>
                        <form method="POST" action="{{ route('lead-magnet-settings.store')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ isset($layout)?$layout->id : '' }}">
        
                                <div class="form-group row">
                                    <!--<div class="col-sm-6 mb-3">-->
                                    <!--    <label>Logo<span style="color: red;">*</span></label>-->
                                    <!--    <input type="file" name="logo" placeholder="Upload Logo" value="{{ old('logo', isset($layout)?$layout->logo : '') }}" @if(isset($layout) && !$layout->logo) required @endif class="form-control" />-->
                                    <!--    @error('logo')-->
                                    <!--        <span class="text-danger">{{ $message }}</span>-->
                                    <!--    @enderror-->
                                    <!--    @if(isset($layout) && $layout->logo)-->
                                    <!--        <img src="{{ $layout->logo }}" alt="logo" height="100px">-->
                                    <!--    @endif-->
                                    <!--</div>-->
                                    <h6 class="col-12 text-info">Header Info</h6>
                                    <hr>
                                    <div class="col-sm-6 mb-3">
                                        <label>Header Background Color<span style="color: red;">*</span></label>
                                        <input type="color" name="header_bg_color" placeholder="" value="{{ old('header_bg_color', isset($layout)?$layout->header_bg_color : '') }}" required class="form-control" />
                                        @error('header_bg_color')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Header Text Color<span style="color: red;">*</span></label>
                                        <input type="color" name="header_text_color" placeholder="" value="{{ old('header_text_color', isset($layout)?$layout->header_text_color:'') }}" required class="form-control" />
                                        @error('header_text_color')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Button Background Color<span style="color: red;">*</span></label>
                                        <input type="color" name="btn_bg_color" placeholder="" value="{{ old('btn_bg_color', isset($layout)?$layout->btn_bg_color : '') }}" required class="form-control" />
                                        @error('btn_bg_color')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Button Text Color<span style="color: red;">*</span></label>
                                        <input type="color" name="btn_text_color" placeholder="" value="{{ old('btn_text_color', isset($layout)?$layout->btn_text_color:'') }}" required class="form-control" />
                                        @error('btn_text_color')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Countdown icon tick color & Download Arrow<span style="color: red;">*</span></label>
                                        <input type="color" name="countdown_color" placeholder="" value="{{ old('countdown_color', isset($layout)?$layout->countdown_color:'') }}" required class="form-control" />
                                        @error('countdown_color')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2 mb-2 mt-3 mb-sm-0 swich_bntts">
                                        Open New Tab
                                        <div class="block_araea mt-1">
                                            <label class="switch"><input value="1" {{ (old('open_new_tab') ?? (isset($layout)?$layout->open_new_tab : '')) == 1 ? 'checked' : '' }} type="checkbox" name="open_new_tab" /> <small></small></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Button Text<span style="color: red;">*</span></label>
                                        <input type="text" name="btn_text" placeholder="Button Text" value="{{ old('btn_text', isset($layout)?$layout->btn_text : '') }}" required class="form-control" />
                                        @error('btn_text')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Button Link<span style="color: red;">*</span></label>
                                        <input type="url" name="btn_link" placeholder="" value="{{ old('btn_link', isset($layout)?$layout->btn_link : '') }}" required class="form-control" />
                                        @error('btn_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <?php /*<h6 class="col-12 text-info">Footer Info</h6>
                                    <hr>
                                    <div class="col-sm-6 mb-3">
                                        <label>Footer Background Color<span style="color: red;">*</span></label>
                                        <input type="color" name="footer_bg_color" placeholder="" value="{{ old('footer_bg_color', isset($layout)?$layout->footer_bg_color : '') }}" required class="form-control" />
                                        @error('footer_bg_color')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Footer Text Color<span style="color: red;">*</span></label>
                                        <input type="color" name="footer_text_color" placeholder="" value="{{ old('footer_text_color', isset($layout)?$layout->footer_text_color:'') }}" required class="form-control" />
                                        @error('footer_text_color')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Button Background Color<span style="color: red;">*</span></label>
                                        <input type="color" name="footer_btn_bgcolor" placeholder="" value="{{ old('footer_btn_bgcolor', isset($layout)?$layout->footer_btn_bgcolor : '') }}" required class="form-control" />
                                        @error('footer_btn_bgcolor')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Button Text Color<span style="color: red;">*</span></label>
                                        <input type="color" name="footer_btn_textcolor" placeholder="" value="{{ old('footer_btn_textcolor', isset($layout)?$layout->footer_btn_textcolor:'') }}" required class="form-control" />
                                        @error('footer_btn_textcolor')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Button Text<span style="color: red;">*</span></label>
                                        <input type="text" name="footer_btn_text" placeholder="Button Text" value="{{ old('footer_btn_text', isset($layout)?$layout->footer_btn_text : '') }}" required class="form-control" />
                                        @error('footer_btn_text')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label>Button Link<span style="color: red;">*</span></label>
                                        <input type="url" name="footer_btn_link" placeholder="" value="{{ old('footer_btn_link', isset($layout)?$layout->footer_btn_link : '') }}" required class="form-control" />
                                        @error('footer_btn_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
        
                                    <div class="col-sm-2 mb-2 mt-3 mb-sm-0 swich_bntts">
                                        Open New Tab
                                        <div class="block_araea mt-1">
                                            <label class="switch"><input value="1" {{ (old('footer_btn_ont') ?? (isset($layout)?$layout->footer_btn_ont : '')) == 1 ? 'checked' : '' }} type="checkbox" name="footer_btn_ont" /> <small></small></label>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="col-sm-12 mb-3">
                                        <label>Copyright Text<span style="color: red;">*</span></label>
                                        <textarea name="copyright_text" id="copyright_text" rows="2" class="form-control" placeholder="Enter Copyright Text">{{ old('copyright_text') ?? (isset($layout)?$layout->copyright_text: '') }}</textarea>
                                    </div> */?>
                                </div> 
        
                                <button type="submit" class="btn btn-success float-right">
                                    {{ isset($layout) ? 'Update' : 'Add' }}
                                </button>
                        </form>
                </div>
            </div>
			</div>
		</div>
	</section>
	<!-- // Modal for add/edit agent community -->
<div class="modal" id="addCommunityModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Add Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="communityForm" method="POST" action="{{ route('lead-magnet-settings.menu-store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <span class="form-text text-muted">Please enter fontawesome icon classes only like <code>fa-check</code> for <i class="fa fa-check"></i> To get icons got to <a href="https://fontawesome.com/v4/icons/" target="_blank">Font Awesome Icons <i class="fas fa-external-link-alt"></i></a></span>
                        <hr>
                        <input type="text" class="form-control" placeholder="Enter Icon Class" name="icon">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Enter Title" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="page_url" placeholder="Enter Page Url" value="javascript:void(0);" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="parent_id">
                            <option value="">Parent Menu</option>
                            @foreach($parents as $p_menu)
                                <option value="{{ $p_menu->id }}">{{ $p_menu->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="type" required>
                            <option value="">Type</option>
                            <option value="1">Header</option>
                            <option value="2">Footer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="open_new_tab" required>
                            <option value="">Open New Tab</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="status" required>
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="editCommunityModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="communityForm" method="POST" action="{{ route('lead-magnet-settings.menu-store') }}">
                @csrf
                <input type="hidden" name="id" id="id" value=""/>
                <div class="modal-body">
                    <div class="form-group">
                        <span class="form-text text-muted">Please enter fontawesome icon classes only like <code>fa-check</code> for <i class="fa fa-check"></i> To get icons got to <a href="https://fontawesome.com/v4/icons/" target="_blank">Font Awesome Icons <i class="fas fa-external-link-alt"></i></a></span>
                        <hr>
                        <input type="text" class="form-control" id="icon" placeholder="Enter Icon Class" name="icon" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Enter Title" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="page_url" name="page_url" placeholder="Enter Page Url" value="javascript:void(0);" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="">Parent Menu</option>
                            @foreach($parents as $p_menu)
                                <option value="{{ $p_menu->id }}">{{ $p_menu->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Type</option>
                            <option value="1">Header</option>
                            <option value="2">Footer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="open_new_tab" name="open_new_tab" required>
                            <option value="">Open New Tab</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('front.layouts.footer')
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function editCommunity(data) {
        $('#editCommunityModal').modal('show');
        $('#id').val(data.id);
        $('#icon').val(data.icon);
        $('#title').val(data.title);
        $('#page_url').val(data.page_url);
        $('#parent_id').val(data.parent_id);
        $('#type').val(data.type);
        $('#open_new_tab').val((data.open_new_tab==true)?1:0);
        $('#status').val(data.status);
    }
    $(document).on('click', '.close', function () {
        $(this).closest('.modal').modal('hide');
    });
</script>