@extends('layouts.app')
@section('content')

<!--page-content-wrapper-->
<div class="card">
    <div class="card-header">
        <h3>Postback URL</h3>
    </div>
    <?php $qry = DB::table('postback')->where('publisher_id', Auth::guard('publisher')->id())->first();
    ?>
    <div class="card-body">
    <div class="row justify-content-center">
                <h1 class="section-heading sh-t6 sh-s6">
                    <span class="post-title h-text">DMCA</span>
                </h1>
                <div class="entry-content clearfix">
                    <p>{{ config('app.url') }} is in compliance with 17 U.S.C. § 512 and in the Digital Millennium Copyright Act (“DMCA”). It is our policy to respond to any infringement notices and take appropriate actions under the Digital Millennium Copyright Act (“DMCA”) and other applicable intellectual property laws.</p>
                    <p>If your copyrighted material has been posted on {{ config('app.url') }} or if hyperlinks to your copyrighted material are returned through our search engine and you want this material removed from this site, then you must provide a written communication that details the information listed in the following section.</p>
                    <p>Kindly be aware that you will be liable for damages (including costs and attorneys’ fees) if you misrepresent information listed on our site that is infringing on your any copyrights. We suggest you that first contact an attorney for legal assistance on this matter.</p>
                    <div><b>If the following elements/segment must be included in your copyright infringement claim:</b></div>
                    <div></div>
                    <ul>
                        <li>Provide an evidence of the authorized person to act on behalf of the owner of an exclusive right that is allegedly infringed.</li>
                        <li>Provide sufficient contact information so that we may contact you. You must also involve a valid email address.</li>
                        <li>You must identify in sufficient detail the copyrighted work claimed to have been infringed and including at least one search term under which the material appears in {{ config('app.url') }} search results.</li>
                        <li>A statement that the complaining party has a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law.</li>
                        <li>A statement that the information in the notification is accurate, and under penalty of perjury, that the complaining party is authorized to act on behalf of the owner of an exclusive right that is allegedly infringed.</li>
                    </ul>
                    <p>Send the infringement notice via email to this address : <code>{{ env('EMAIL_FROM_ADDRESS') }}</code></p>
                    <div><mark class="bs-highlight bs-highlight-default">Please allow up to 2 days for an email response.</mark></div>
                    <p>&nbsp;</p>
                </div>
            </div> <!-- row -->
    </div>
</div>
@endsection('content')