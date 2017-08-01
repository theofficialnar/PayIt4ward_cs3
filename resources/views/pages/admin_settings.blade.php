@extends('../layouts/master')

@section('title')
    Admin Settings
@endsection

@section('main_section')
<div class="topPadding">
    <div class="well row">
        <h1 class="text-center">Update Contribution Table</h1>
        <hr>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#tax_table">Tax Table</a></li>
                <li><a data-toggle="pill" href="#sss_table">SSS Table</a></li>
                <li><a data-toggle="pill" href="#philhealth_table">Philhealth Table</a></li>
            </ul>

            {{--  tax table  --}}
            <div class="tab-content">
                <div id="tax_table" class="tab-pane fade in active">
                    <h3>Tax Table</h3>
                    <form method="POST" action="admin_settings/tax">
                        {{csrf_field()}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Bracket</th>
                        @foreach($tax_table as $tax)
                                    <th>{{$tax->id}}</th>
                        @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Exemption</td>
                        @foreach($tax_table as $tax)
                                    <td><input type="number" name="exemp_{{$tax->id}}" value="{{$tax->exemption}}" class="contrib_input"></td>
                        @endforeach
                                </tr>
                                <tr>
                                    <td>Status (%)</td>
                        @foreach($tax_table as $tax)
                                    <td><input type="number" name="status_{{$tax->id}}" value="{{$tax->status}}" class="contrib_input"></td>
                        @endforeach
                                </tr>
                                <tr>            
                                    <td>Z</td>
                        @foreach($tax_table as $tax)
                                    <td><input type="number" name="z_{{$tax->id}}" value="{{$tax->z}}" class="contrib_input"></td>
                        @endforeach
                                </tr>
                                <tr>            
                                    <td>S/ME</td>
                        @foreach($tax_table as $tax)
                                    <td><input type="number" name="sme_{{$tax->id}}" value="{{$tax->sme}}" class="contrib_input"></td>
                        @endforeach
                                </tr>
                                <tr>            
                                    <td>ME1/S1</td>
                        @foreach($tax_table as $tax)
                                    <td><input type="number" name="me1se1_{{$tax->id}}" value="{{$tax->me1se1}}" class="contrib_input"></td>
                        @endforeach
                                </tr>
                                <tr>
                                    <td>ME2/S2</td>
                        @foreach($tax_table as $tax)
                                    <td><input type="number" name="me2se2_{{$tax->id}}" value="{{$tax->me2se2}}" class="contrib_input"></td>
                        @endforeach
                                </tr>
                                <tr>           
                                    <td>ME3/S3</td>
                        @foreach($tax_table as $tax)
                                    <td><input type="number" name="me3se3_{{$tax->id}}" value="{{$tax->me3se3}}" class="contrib_input"></td>
                        @endforeach
                                </tr>
                                <tr>
                                    <td>ME4/S4</td>
                        @foreach($tax_table as $tax)
                                    <td><input type="number" name="me4se4_{{$tax->id}}" value="{{$tax->me4se4}}" class="contrib_input"></td>
                        @endforeach
                                </tr>
                            </tbody>
                        </table>
                        <button>Save Changes</button>
                    </form>
                </div>

                {{--  sss table  --}}
                <div id="sss_table" class="tab-pane fade">
                    <h3>SSS Contribution Table</h3>
                    <p>Some content in menu 1.</p>
                </div>

                {{--  philhealth table  --}}
                <div id="philhealth_table" class="tab-pane fade">
                    <h3>Philhealth Contribution Table</h3>
                    <p>Some content in menu 2.</p>
                </div>
            </div>
    </div>
</div>
    
@endsection