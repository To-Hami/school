<div>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

    @if ($catchError)
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif


    @if($show_table)
        @include('livewire.Parent_Table')
    @else
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                       class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                    <p>معلومات ولي الامر</p>
                </div>

                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                       class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}"
                       disabled="disabled">2</a>
                    <p>أضافة المرفقات وتأكيد المعلومات</p>
                </div>
            </div>
        </div>
    @endif
    @include('livewire.Father_Form')


    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
        @if ($currentStep != 2)
            <div style="display: none" class="row setup-content" id="step-2">
                @endif

                <div class="col-xs-12">
                    <div class="col-md-12"><br>
                        <label style="color: red">{{trans('Parent_trans.Attachments')}}</label>
                        <div class="form-group">
                            <input class="form-control" type="file" wire:model="photos" accept="image/*" multiple>
                        </div>
                        <br>

                        <input type="hidden" wire:model="Parent_id">

                        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                                wire:click="back(1)">{{ trans('Parent_trans.Back') }}</button>

                        @if($updateMode)
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                    wire:click="submitForm_edit"
                                    type="button">{{trans('Parent_trans.Finish')}}
                            </button>
                        @else
                            <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                                    type="button">{{ trans('Parent_trans.Finish') }}</button>
                        @endif

                    </div>
                </div>
            </div>


    </div>
</div>
