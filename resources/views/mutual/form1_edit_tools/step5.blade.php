<div class="row form-material">
	<div class="col-md-12">
        <div class="paper">
            <div class="paper-content">
                <textarea type="text" class=" @error('notes') is-invalid @enderror mx" id="notes" name="notes" value="{{ old('notes') }}" autocomplete="address" placeholder="  ملاحظات " autofocus required rows="5" maxlength="550" minlength="3" data-toggle="tooltip" data-placement="left" title="{{ __(' ملاحظات ')}}" data-parsley-required-message="هذا الحقل مطلوب" >{{ $Form->notes }}</textarea>
                @error('notes')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div> <!-- paper-content -->
        </div> <!-- paper -->
    </div> <!-- end col -->
</div> <!-- end row -->
 <br><br>
 <div class="row form-material">
  <div class="col-md-4">
    <label for="employee_name" class="col-form-label text-right"> {{__('  اسم الموظف     ')}}</label>
        <input type="text" class="form-control @error('employee_name') is-invalid @enderror mx" id="employee_name" name="employee_name" value="{{ $Form->employee_name }}" autocomplete="employee_name" autofocus maxlength="30" minlength="3">
            @error('employee_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
  </div> <!-- end col -->
  <div class="col-md-4">
    <label for="inspector" class="col-form-label text-right"> {{__(' المتواجد أثناء الكشف ')}}</label>
        <input type="text" class="form-control @error('inspector') is-invalid @enderror mx" id="inspector" name="inspector" value="{{ $Form->inspector }}" autocomplete="inspector" autofocus maxlength="20" minlength="3">
            @error('inspector')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
  </div> <!-- end col -->
  <div class="col-md-4">
    <label for="inspector2" class="col-form-label text-right"> {{__(' علاقته بالعميل ')}}</label>
        <input type="text" class="form-control @error('inspector2') is-invalid @enderror mx" id="inspector2" name="inspector2" value="{{ $Form->inspector2 }}" autocomplete="inspector2" autofocus maxlength="30" minlength="3">
            @error('inspector2')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
  </div> <!-- end col -->
</div> <!-- end row -->