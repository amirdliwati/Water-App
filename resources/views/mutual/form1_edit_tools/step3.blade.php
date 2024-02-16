<div class="ribbon-1">
    <div class="ribbon-box">
    	<div class="ribbon ribbon-mark ribbon-right bg-primary"> معلومات الحديقة  </div>
    		<div class="row form-material">
				<div class="col-md-2">
				<p class="text-muted font-14 mt-3 mb-2">  هل يوجد حديقة  </p>
				@if($Form->field_examination->garden_true == 1)                              
				    <div class="radio radio-success form-check-inline">
				        <input type="radio" name="garden" id="garden_true" value="1" checked="">
				        <label for="garden_true">
				            نعم
				        </label>
				    </div>
				    <div class="radio radio-pink form-check-inline">
				        <input type="radio" name="garden" id="garden_false" value="0">
				        <label for="garden_false">
				            لا
				        </label>
				    </div>
				@else
					<div class="radio radio-success form-check-inline">
				        <input type="radio" name="garden" id="garden_true" value="1">
				        <label for="garden_true">
				            نعم
				        </label>
				    </div>
				    <div class="radio radio-pink form-check-inline">
				        <input type="radio" name="garden" id="garden_false" value="0" checked="">
				        <label for="garden_false">
				            لا
				        </label>
				    </div>
				@endif
				</div> <!-- end col -->
				<div class="col-md-3">
					<label for="garden_space" class="col-form-label text-right">{{__('  	مساحة العشب الأخضر  ')}}</label>
				      <input type="number" step="0.01" class="form-control  @error('garden_space') is-invalid @enderror ts" id="garden_space" name="garden_space" value="{{ $Form->field_examination->garden_space }}" autocomplete="garden_space" placeholder="" autofocus >
				      @error('garden_space')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-3">
					<label for="count_tree" class="col-form-label text-right">{{__('  عدد الأشجار الكبيرة  ')}}</label>
				      <input type="number" class="form-control  @error('count_tree') is-invalid @enderror" id="count_tree" name="count_tree" value="{{ $Form->field_examination->count_tree }}" autocomplete="count_tree" placeholder="" autofocus >
				      @error('count_tree')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-3">
					<label for="tree_tall" class="col-form-label text-right">{{__('  طول أشجار السياج ')}}</label>
				      <input type="number" step="0.01" class="form-control  @error('tree_tall') is-invalid @enderror ts" id="tree_tall" name="tree_tall" value="{{ $Form->field_examination->tree_tall }}" autocomplete="tree_tall" placeholder="" autofocus >
				      @error('tree_tall')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
			</div> <!-- end row -->
			<div class="row form-material">
				<div class="col-md-3">
					<label for="area_humidity" class="col-form-label text-right">{{__(' المناطق الرطبة ')}}</label>
				      <input type="number" step="0.01" class="form-control  @error('area_humidity') is-invalid @enderror ts" id="area_humidity" name="area_humidity" value="{{ $Form->field_examination->area_humidity }}" autocomplete="area_humidity" placeholder="" autofocus >
				      @error('area_humidity')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-3">
					<label for="count_tree_n" class="col-form-label text-right">{{__(' 	عدد أشجار النخيل ')}}</label>
				      <input type="number" class="form-control  @error('count_tree_n') is-invalid @enderror" id="count_tree_n" name="count_tree_n" value="{{ $Form->field_examination->count_tree_n }}" autocomplete="count_tree_n" placeholder="" autofocus >
				      @error('count_tree_n')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-3">
					<label for="count_flower" class="col-form-label text-right">{{__('عدد أحواض الزهور ')}}</label>
				      <input type="number" class="form-control  @error('count_flower') is-invalid @enderror" id="count_flower" name="count_flower" value="{{ $Form->field_examination->count_flower }}" autocomplete="count_flower" placeholder="" autofocus >
				      @error('count_flower')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-3">
					<label for="count_tree_small" class="col-form-label text-right">{{__('	عدد الأشجار الصغيرة  ')}}</label>
				      <input type="number" class="form-control  @error('count_tree_small') is-invalid @enderror" id="count_tree_small" name="count_tree_small" value="{{ $Form->field_examination->count_tree_small }}" autocomplete="count_tree_small" placeholder="" autofocus >
				      @error('count_tree_small')
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
    	<div class="ribbon ribbon-mark ribbon-right bg-info">  طريقة الري   </div>
			<div class="row form-material">
				<div class="col-md-3">
                   @if($Form->field_examination->Irrigation_method_1 == 1)
                    <div class="checkbox  form-check-inline">
                        <input type="checkbox" id="Irrigation_method_1" name="Irrigation_method_1" value="1" checked="">
                        <label for="Irrigation_method_1"> {{__('   غمر  ')}} </label>
                    </div>
                   @else
                    <div class="checkbox  form-check-inline">
                        <input type="checkbox" id="Irrigation_method_1" name="Irrigation_method_1" value="1">
                        <label for="Irrigation_method_1"> {{__('   غمر  ')}} </label>
                    </div>
                   @endif
                    
				</div><!-- end col -->
				<div class="col-md-3">
					@if($Form->field_examination->Irrigation_method_2 == 1)
                    <div class="checkbox checkbox-info form-check-inline">
                        <input type="checkbox" id="Irrigation_method_2" name="Irrigation_method_2" value="1" checked="">
                        <label for="Irrigation_method_2"> {{__('  رش  ')}} </label>
                    </div>
                    @else
                    <div class="checkbox checkbox-info form-check-inline">
                        <input type="checkbox" id="Irrigation_method_2" name="Irrigation_method_2" value="1">
                        <label for="Irrigation_method_2"> {{__('  رش  ')}} </label>
                    </div>
                    @endif
				</div><!-- end col -->
				<div class="col-md-3">
					@if($Form->field_examination->Irrigation_method_3 == 1)
                    <div class="checkbox checkbox-primary form-check-inline">
                        <input type="checkbox" id="Irrigation_method_3" name="Irrigation_method_3" value="1" checked="">
                        <label for="Irrigation_method_3"> {{__('  تنقيط  ')}} </label>
                    </div>
                    @else
                    <div class="checkbox checkbox-primary form-check-inline">
                        <input type="checkbox" id="Irrigation_method_3" name="Irrigation_method_3" value="1">
                        <label for="Irrigation_method_3"> {{__('  تنقيط  ')}} </label>
                    </div>
                    @endif
				</div><!-- end col -->
				<div class="col-md-3">
					@if($Form->field_examination->Irrigation_method_4 == 1)
                    <div class="checkbox checkbox-success form-check-inline">
                        <input type="checkbox" id="Irrigation_method_4" name="Irrigation_method_4" value="1" checked="">
                        <label for="Irrigation_method_4"> {{__('  غمر و رش ')}} </label>
                    </div>
                    @else
                    <div class="checkbox checkbox-success form-check-inline">
                        <input type="checkbox" id="Irrigation_method_4" name="Irrigation_method_4" value="1">
                        <label for="Irrigation_method_4"> {{__('  غمر و رش ')}} </label>
                    </div>
                    @endif
				</div><!-- end col -->
			</div> <!-- end row -->
			<div class="row form-material">
				<div class="col-md-8">
					<label for="resource_Irrigation" class="col-form-label text-right"> {{__('  مصدر الري  ')}}</label>
			        <input type="text" class="form-control @error('resource_Irrigation') is-invalid @enderror mx" id="resource_Irrigation" name="resource_Irrigation" value="{{ $Form->field_examination->resource_Irrigation }}" autocomplete="resource_Irrigation" autofocus required maxlength="19" minlength="3">
			            @error('resource_Irrigation')
			              <span class="invalid-feedback" role="alert">
			                <strong>{{ $message }}</strong>
			              </span>
			            @enderror
				</div><!-- end col -->
				<div class="col-md-4">
					<label for="estimated_average_garden" class="col-form-label text-right">{{__('  المعدل التقديري للحدائق  ')}}</label>
				      <input type="number" step="0.01" class="form-control  @error('estimated_average_garden') is-invalid @enderror ts" id="estimated_average_garden" name="estimated_average_garden" value="{{ $Form->field_examination->estimated_average_garden }}" autocomplete="estimated_average_garden" placeholder="" autofocus >
				      @error('estimated_average_garden')
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
    	<div class="ribbon ribbon-mark ribbon-right bg-danger">   سجل قراءات العداد  </div>
			<div class="row form-material">
				<div class="col-md-4">
					<label for="first_read" class="col-form-label text-right">{{__('  القراءة الأولى ')}}</label>
				      <input type="number" class="form-control  @error('first_read') is-invalid @enderror " id="first_read" name="first_read" value="{{ $Form->field_examination->first_read }}" autocomplete="first_read" placeholder="" autofocus >
				      @error('first_read')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-4">
					<label for="second_read" class="col-form-label text-right">{{__(' 	القراءة الثانية  ')}}</label>
				      <input type="number" class="form-control  @error('second_read') is-invalid @enderror " id="second_read" name="second_read" value="{{ $Form->field_examination->second_read }}" autocomplete="second_read" placeholder="" autofocus >
				      @error('second_read')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-4">
					<label for="duration" class="col-form-label text-right">{{__(' 	المدة باليوم ')}}</label>
				      <input type="number" class="form-control  @error('duration') is-invalid @enderror " id="duration" name="duration" value="{{ $Form->field_examination->duration }}" autocomplete="duration" placeholder="" autofocus >
				      @error('duration')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
			</div> <!-- end row -->
			<div class="row form-material">
				<div class="col-md-4">
					<label for="date_1" class="col-form-label text-right">  تاريخها </label>
				      <div class="input-group">
				        <div class="input-group-append">
				          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
				        </div>
				      <input type="date" class="form-control @error('date_1') is-invalid @enderror" placeholder="YYY-MM-DD" id="date_1" name="date_1" value="{{ $Form->field_examination->date_1 }}" autocomplete="date_1">
				      </div>
				      @error('date_1')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-4">
					<label for="date_2" class="col-form-label text-right">  تاريخها </label>
				      <div class="input-group">
				        <div class="input-group-append">
				          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
				        </div>
				      <input type="date" class="form-control @error('date_2') is-invalid @enderror" placeholder="YYY-MM-DD" id="date_2" name="date_2" value="{{ $Form->field_examination->date_2 }}" autocomplete="date_2">
				      </div>
				      @error('date_2')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
				<div class="col-md-4">
					<label for="average_now" class="col-form-label text-right">{{__(' 	المعدل الحالي بناء عللى حالة العداد	  ')}}</label>
				      <input type="number" step="0.01" class="form-control  @error('average_now') is-invalid @enderror ts" id="average_now" name="average_now" value="{{ $Form->field_examination->average_now }}" autocomplete="average_now" placeholder="" autofocus >
				      @error('average_now')
				        <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				        </span>
				      @enderror
				</div><!-- end col -->
			</div> <!-- end row -->
	</div><!-- end ribbon-box -->
</div><!-- end ribbon-1 -->