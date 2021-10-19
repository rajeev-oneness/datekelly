@extends('front.master')

@section('title')
    FAQs
@endsection

@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <h4 class="mb-4">FAQs</h4>
            </div>
        </div>
        <div class="row justify-content-center login-body">
            <div class="col-12 col-md-9">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="container ">
                            <div class="panel-group" id="faqAccordion">
                                <div class="panel panel-default bg-light p-3 m-1">
                                    <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                                         <h4 class="panel-title">
                                            <a href="javascript:void(0);" class="ing">Q: What is Lorem Ipsum?</a>
                                      </h4>
                        
                                    </div>
                                    <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                             <h5><span class="label label-primary">Answer</span></h5>
                        
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id arcu massa. Sed eu metus placerat, imperdiet nisl a, interdum lacus. Proin et sollicitudin libero. Morbi tempus faucibus egestas. In a mauris lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque sed consectetur dolor. Suspendisse sit amet velit dolor. Quisque ut viverra dui, porttitor ornare eros. Aenean aliquam lobortis augue, nec sollicitudin lacus volutpat ac. Quisque eget tortor sodales, aliquet leo ut, commodo purus. Aliquam semper ornare dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus eu efficitur libero, eu malesuada quam. Mauris porttitor metus vitae felis imperdiet, non efficitur eros laoreet.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default bg-light p-3 m-1">
                                    <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                         <h4 class="panel-title">
                                            <a href="javascript:void(0);" class="ing">Q: Why do we use it?</a>
                                      </h4>
                        
                                    </div>
                                    <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                             <h5><span class="label label-primary">Answer</span></h5>
                        
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id arcu massa. Sed eu metus placerat, imperdiet nisl a, interdum lacus. Proin et sollicitudin libero. Morbi tempus faucibus egestas. In a mauris lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque sed consectetur dolor. Suspendisse sit amet velit dolor. Quisque ut viverra dui, porttitor ornare eros. Aenean aliquam lobortis augue, nec sollicitudin lacus volutpat ac. Quisque eget tortor sodales, aliquet leo ut, commodo purus. Aliquam semper ornare dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus eu efficitur libero, eu malesuada quam. Mauris porttitor metus vitae felis imperdiet, non efficitur eros laoreet.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default bg-light p-3 m-1">
                                    <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
                                         <h4 class="panel-title">
                                            <a href="javascript:void(0);" class="ing">Q: Where does it come from?</a>
                                      </h4>
                        
                                    </div>
                                    <div id="question2" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                             <h5><span class="label label-primary">Answer</span></h5>
                        
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id arcu massa. Sed eu metus placerat, imperdiet nisl a, interdum lacus. Proin et sollicitudin libero. Morbi tempus faucibus egestas. In a mauris lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque sed consectetur dolor. Suspendisse sit amet velit dolor. Quisque ut viverra dui, porttitor ornare eros. Aenean aliquam lobortis augue, nec sollicitudin lacus volutpat ac. Quisque eget tortor sodales, aliquet leo ut, commodo purus. Aliquam semper ornare dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus eu efficitur libero, eu malesuada quam. Mauris porttitor metus vitae felis imperdiet, non efficitur eros laoreet.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default bg-light p-3 m-1">
                                    <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                                         <h4 class="panel-title">
                                            <a href="javascript:void(0);" class="ing">Q: Where can I get some?</a>
                                      </h4>
                        
                                    </div>
                                    <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                             <h5><span class="label label-primary">Answer</span></h5>
                        
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id arcu massa. Sed eu metus placerat, imperdiet nisl a, interdum lacus. Proin et sollicitudin libero. Morbi tempus faucibus egestas. In a mauris lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque sed consectetur dolor. Suspendisse sit amet velit dolor. Quisque ut viverra dui, porttitor ornare eros. Aenean aliquam lobortis augue, nec sollicitudin lacus volutpat ac. Quisque eget tortor sodales, aliquet leo ut, commodo purus. Aliquam semper ornare dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus eu efficitur libero, eu malesuada quam. Mauris porttitor metus vitae felis imperdiet, non efficitur eros laoreet.</p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!--/panel-group-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection