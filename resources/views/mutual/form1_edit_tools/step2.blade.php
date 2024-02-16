<div class="ribbon-1">
    <div class="ribbon-box">
    	<div class="ribbon ribbon-mark ribbon-right bg-primary">  المستفيدين  </div>
			<div class="row form-material">
				<div class="col-md-3">
					<label for="count_residents" class="col-form-label text-right">{{__('عدد المقيمين   ')}}</label>
				      <input type="number" class="form-control  @error('count_residents') is-invalid @enderror" id="count_residents" name="count_residents" value="{{ $Form->field_examination->count_residents }}" autocomplete="count_residents" placeholder="" autofocus  >
				      @error('count_residents')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-3">
					<label for="count_employees" class="col-form-label text-right">{{__('عدد الموظفين  ')}}</label>
				      <input type="number" class="form-control  @error('count_employees') is-invalid @enderror" id="count_employees" name="count_employees" value="{{ $Form->field_examination->count_employees }}" autocomplete="count_employees" placeholder="" autofocus  >
				      @error('count_employees')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-3">
					<label for="count_students" class="col-form-label text-right">{{__('  عدد الطلاب ')}}</label>
				      <input type="number" class="form-control  @error('count_students') is-invalid @enderror" id="count_students" name="count_students" value="{{ $Form->field_examination->count_students }}" autocomplete="count_students" placeholder="" autofocus  >
				      @error('count_students')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-3">
					<label for="estimated_average_beneficiary" class="col-form-label text-right">{{__('المعدل التقديري للمستفيدين  ')}}</label>
				      <input type="number" step="0.01" class="form-control  @error('estimated_average_beneficiary') is-invalid @enderror ts" id="estimated_average_beneficiary" name="estimated_average_beneficiary" value="{{ $Form->field_examination->estimated_average_beneficiary }}" autocomplete="estimated_average_beneficiary" placeholder="" autofocus required >
				      @error('estimated_average_beneficiary')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
			</div> <!-- end row -->
	</div><!-- end ribbon-box -->
</div><!-- end ribbon-1 -->

<div class="ribbon-1">
    <div class="ribbon-box">
    	<div class="ribbon ribbon-mark ribbon-right bg-info">  بيانات المبنى   </div>
			<div class="row form-material">
				<div class="col-md-4">
					<label for="count_wc" class="col-form-label text-right">{{__('عدد دورات المياه  ')}}</label>
				      <input type="number" class="form-control  @error('count_wc') is-invalid @enderror" id="count_wc" name="count_wc" value="{{ $Form->field_examination->count_wc }}" autocomplete="count_wc" placeholder="" autofocus >
				      @error('count_wc')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-4">
					<label for="count_kitchen" class="col-form-label text-right">{{__('عدد المطابح ')}}</label>
				      <input type="number" class="form-control  @error('count_kitchen') is-invalid @enderror" id="count_kitchen" name="count_kitchen" value="{{ $Form->field_examination->count_kitchen }}" autocomplete="count_kitchen" placeholder="" autofocus >
				      @error('count_kitchen')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-4">
					<label for="pool" class="col-form-label text-right">{{__('  هل يوجد مسبح؟  ')}}</label>
					<select class="form-control mb-3 custom-select @error('pool') is-invalid @enderror" id="pool" name="pool" autocomplete="pool" autofocus>
			            <option selected="selected" value="{{ $Form->field_examination->pool }}">{{ $Form->field_examination->pool }}</option>
			            <option value="  نعم ">{{__(' نعم  ')}}</option>
			            <option value="  لا ">{{__(' لا  ')}}</option>
			        </select>
			        @error('pool')
			            <span class="invalid-feedback" role="alert">
			              <strong>{{ $message }}</strong>
			            </span>
			        @enderror
				</div><!-- end col -->
			</div> <!-- end row -->

			<div class="row form-material">
				<div class="col-md-4">
					<label for="size_pool" class="col-form-label text-right">{{__('ححجم المسبح متر مكعب ')}}</label>
				      <input type="number" step="0.01" class="form-control  @error('size_pool') is-invalid @enderror ts" id="size_pool" name="size_pool" value="{{ $Form->field_examination->size_pool }}" autocomplete="size_pool" placeholder="" autofocus >
				      @error('size_pool')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-8">
					<label for="resource_pool" class="col-form-label text-right"> {{__('  مصدر مياه المسبح  ')}}</label>
			        <input type="text" class="form-control @error('resource_pool') is-invalid @enderror mx" id="resource_pool" name="resource_pool" value="{{ $Form->field_examination->resource_pool }}" autocomplete="resource_pool" autofocus maxlength="19" required>
			            @error('resource_pool')
			              <span class="invalid-feedback" role="alert">
			                <strong>{{ $message }}</strong>
			              </span>
			            @enderror
				</div><!-- end col -->

			</div> <!-- end row -->
			<div class="row form-material">
				<div class="col-md-6">
					<p class="text-muted font-13 mt-3 mb-2">مرافق أخرى</p>
					@if($Form->field_examination->other_restaurant == 1)
                    <div class="checkbox checkbox-info form-check-inline">
                        <input type="checkbox" id="other_restaurant" name="other_restaurant" value="1" checked="">
                        <label for="other_restaurant"> {{__('  مطعم ')}} </label>
                    </div>
                    @else
                    <div class="checkbox checkbox-info form-check-inline">
                        <input type="checkbox" id="other_restaurant" name="other_restaurant" value="1">
                        <label for="other_restaurant"> {{__('  مطعم ')}} </label>
                    </div>
                    @endif
                    @if($Form->field_examination->other_laundry == 1)
                    <div class="checkbox checkbox-success form-check-inline">
                        <input type="checkbox" id="other_laundry" name="other_laundry" value="1" checked="">
                        <label for="other_laundry"> {{__(' مغسلة الملابس ')}} </label>
                    </div>
                    @else
                    <div class="checkbox checkbox-success form-check-inline">
                        <input type="checkbox" id="other_laundry" name="other_laundry" value="1">
                        <label for="other_laundry"> {{__(' مغسلة الملابس ')}} </label>
                    </div>
                    @endif
                    @if($Form->field_examination->other == 1)
                    <div class="checkbox checkbox-pink form-check-inline">
                        <input type="checkbox" id="other" name="other" value="1" checked="">
                        <label for="other"> {{__(' أخرى ')}} </label>
                    </div>
                    @else
                    <div class="checkbox checkbox-pink form-check-inline">
                        <input type="checkbox" id="other" name="other" value="1">
                        <label for="other"> {{__(' أخرى ')}} </label>
                    </div>
                    @endif
				</div><!-- end col -->
				<div class="col-md-2">

				</div><!-- end col -->
				<div class="col-md-4">
					<label for="create_tools" class="col-form-label text-right">{{__('  هل تم تركيب أدوات الترشيد ؟  ')}}</label>
				      <select class="form-control mb-3 custom-select @error('create_tools') is-invalid @enderror" id="create_tools" name="create_tools" autocomplete="create_tools" autofocus>
				            <option selected="selected" value="{{ $Form->field_examination->create_tools }}">{{ $Form->field_examination->create_tools }}</option>
				            <option value="نعم">{{__('  نعم  ')}}</option>
				            <option value=" لا  ">{{__('  لا  ')}}</option>
				       </select>
				      @error('create_tools')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
			</div> <!-- end row -->
	</div><!-- end ribbon-box -->
</div><!-- end ribbon-1 -->

<div class="ribbon-1">
    <div class="ribbon-box">
    	<div class="ribbon ribbon-mark ribbon-right bg-danger">  المكيفات الصحراوية  </div>
			<div class="row form-material">
				<div class="col-md-4">
					<label for="ac_1" class="col-form-label text-right">4/1</label>
				      <input type="number" class="form-control  @error('ac_1') is-invalid @enderror" id="ac_1" name="ac_1" value="{{ $Form->field_examination->ac_1 }}" autocomplete="ac_1" placeholder="" autofocus >
				      @error('ac_1')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-4">
					<label for="ac_2" class="col-form-label text-right">2/1</label>
				      <input type="number" class="form-control  @error('ac_2') is-invalid @enderror" id="ac_2" name="ac_2" value="{{ $Form->field_examination->ac_2 }}" autocomplete="ac_2" placeholder="" autofocus >
				      @error('ac_2')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-4">
					<label for="ac_3" class="col-form-label text-right">3/1</label>
				      <input type="number" class="form-control  @error('ac_3') is-invalid @enderror" id="ac_3" name="ac_3" value="{{ $Form->field_examination->ac_3 }}" autocomplete="ac_3" placeholder="" autofocus >
				      @error('ac_3')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
			</div> <!-- end row -->

			<div class="row form-material">
				<div class="col-md-4">
					<label for="ac_4" class="col-form-label text-right">4/3</label>
				      <input type="number" class="form-control  @error('ac_4') is-invalid @enderror" id="ac_4" name="ac_4" value="{{ $Form->field_examination->ac_4 }}" autocomplete="ac_4" placeholder="" autofocus >
				      @error('ac_4')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-4">
					<label for="ac_5" class="col-form-label text-right">1</label>
				      <input type="number" class="form-control  @error('ac_5') is-invalid @enderror" id="ac_5" name="ac_5" value="{{ $Form->field_examination->ac_5 }}" autocomplete="ac_5" placeholder="" autofocus >
				      @error('ac_5')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-4">
					<label for="ac_6" class="col-form-label text-right">2/11</label>
				      <input type="number" class="form-control  @error('ac_6') is-invalid @enderror" id="ac_6" name="ac_6" value="{{ $Form->field_examination->ac_6 }}" autocomplete="ac_6" placeholder="" autofocus >
				      @error('ac_6')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
			</div> <!-- end row -->

			<div class="row form-material">
				<div class="col-md-6">
					<label for="estimated_average_ac" class="col-form-label text-right">{{__('  المعدل التقديري للمكيفات الصحراوية  ')}}</label>
				      <input type="number" step="0.01" class="form-control  @error('estimated_average_ac') is-invalid @enderror ts" id="estimated_average_ac" name="estimated_average_ac" value="{{ $Form->field_examination->estimated_average_ac }}" autocomplete="estimated_average_ac" placeholder="" autofocus >
				      @error('estimated_average_ac')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
			</div> <!-- end row -->
	</div><!-- end ribbon-box -->
</div><!-- end ribbon-1 -->