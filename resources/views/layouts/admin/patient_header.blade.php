 <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card" style="padding-top: 20px">
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="90" height="90"
                                        src="{{ asset($patient->image) }}" alt="avatar">
                                    <div class="media-body mt-4">

                                        <h6 class="media-title"><a style="color: #410353;" href="#">{{ $patient->name }}</a></h6>
                                        <div class="text-small text-muted"> Cadatradado em
                                            {{ $patient->created_at->format('d/m/Y') }} <span>
                                                {{-- class="text-primary">Now</span> --}}
                                        </div>

                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
