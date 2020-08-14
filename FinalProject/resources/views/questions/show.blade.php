@extends('adminlte.master')
@section('content')

<style>
  .question-time {
    display: flex; 
    padding-bottom: 8px; 
    border-bottom: 1px solid #000000;
    margin-bottom: 1rem;
  }

  .post-layout {
    display: grid;
    grid-template-columns: max-content 1fr;
    box-sizing: inherit;
  }

  .post-layout--left, .post-layout--left.votecell {
      width: auto;
      padding-right: 16px;
    }
    .votecell {
      vertical-align: top;
    }
    .post-layout--left {
      grid-column: 1;
    }

  .question .postcell {
    vertical-align: top;
  }
  .post-layout--right {
      /* padding-right: 16px; */
      grid-column: 2;
      width: auto;
      min-width: 0;
  }

  .btn-arrow {
    color: rgb(187, 192, 196);
    background: transparent;
    border: 0;
  }
  button:focus {
    outline: 0;
  }
  svg {
    fill: currentColor;
    color: rgb(187, 192, 196);
  }

  .post-tag {
    font-size: 12px;
    color: rgb(57, 115, 157);
    background-color: rgb(225, 236, 244);;
    border-color: transparent;
    display: inline-block;
    padding: .4em .5em;
    margin: 2px 2px 2px 0;
    line-height: 1;
    white-space: nowrap;
    text-decoration: none;
    text-align: center;
    border-width: 1px;
    border-style: solid;
    border-radius: 3px;
  }

  .question-user {
    max-width: 200px;
    margin-left: auto;
  }

  [class*="grid--cell"] {
    margin-right: 0;
    margin-left: 0;
  }
  .gs8>.grid--cell {
      margin: 4px;
  }
  .owner {
      border-radius: 3px;
      background-color: rgb(225, 236, 244);
  }
  .post-signature {
      text-align: left;
      vertical-align: top;
      width: 200px;
  }

  .user-info {
    background-color: rgb(225, 236, 244);
    box-sizing: border-box;
    padding: 5px 6px 7px 7px;
    color: rgb(106, 115, 124);
    margin-left: auto;
  }

  .user-info::after {
    content: ""; 
    visibility: hidden; 
    display: block; 
    clear: both;
  }

  .user-info .user-action-time {
    margin-top: 1px;
    margin-bottom: 4px;
    font-size: 12px;
    white-space: nowrap;
  }

  .user-info .user-avatar {
    float: left;
    width: 32px;
    height: 32px;
    border-radius: 1px;
  }

  .user-info .user-avatar+.user-details {
    margin-left: 8px;
    width: calc(100% - 40px);
  }

  .user-info .user-details {
    float: left;
  }
  .user-details {
      line-height: 17px;
  }

  .like {
    background-image: url('{{asset('assets/img/like.png')}}')
  }
</style>

<div class="content">
  <div class="question-header">
    <h1><a href="#">{{$question->title}}</a></h1>
  </div>
  
  <div class="question-time">
    <div class="mr-1" title="2020-08-14 12:44:29Z">
      <span style="color: rgb(106, 115, 124);">Asked</span>
      <time itemprop="dateCreated">{{date('l',strtotime($question->updated_at))}} - </time>
    </div>
      <div>
        <span style="color: rgb(106, 115, 124);">Active</span>
        <a href="?lastactivity" class="s-link s-link__inherit" title="2020-08-14 12:44:29Z">{{date('l',strtotime($question->created_at))}}</a>
      </div>
    </div>
  </div>

  <div class="mainbar">
    <div class="question">
      <div class="post-layout">
        <!-- Content posting -->
        <div class="votecell post-layout--left">
          <div class="wrap-btn" data-post-id="63413020">
            <button class="btn-arrow" data-controller="s-tooltip" data-s-tooltip-placement="right" aria-pressed="false" aria-label="Up vote" data-selected-classes="fc-theme-primary" aria-describedby="--stacks-s-tooltip-66m5oiza">
              <svg aria-hidden="true" class="" width="36" height="36" viewBox="0 0 36 36">
                <path d="M2 26h32L18 10 2 26z"></path>
              </svg>
            </button>

            {{-- <div id="--stacks-s-tooltip-66m5oiza" class="" aria-hidden="true" role="tooltip">This question shows research effort; it is useful and clear
              <div class=""></div>
            </div> --}}
            
            <div class="text-center" itemprop="upvoteCount" data-value="0">0</div>

            <button class="btn-arrow" data-controller="s-tooltip" data-s-tooltip-placement="right" aria-pressed="false" aria-label="Down vote" data-selected-classes="fc-theme-primary" aria-describedby="--stacks-s-tooltip-u19wil8r">
              <svg aria-hidden="true" class="" width="36" height="36" viewBox="0 0 36 36">
                <path d="M2 10h32L18 26 2 10z"></path>
              </svg>
            </button>

            {{-- <div id="--stacks-s-tooltip-u19wil8r" class="" aria-hidden="true" role="tooltip">This question does not show any research effort; it is unclear or not useful
              <div class=""></div>
            </div> --}}
          </div>
        </div>

        <div class="postcell post-layout--right">
          <div class="post-text" itemprop="text">
            <p>
              I'd like to know, if there's some link to dat.gui code. I want to download it by the link, since I have some problems with the npm, so it's easier for me. Thanks for your help :)
            </p>
          </div>

          <div class="post-taglist grid gs4 gsy fd-column">
            <div class="grid ps-relative d-block">
              <a href="/questions/tagged/javascript" class="post-tag js-gps-track" title="" rel="tag">javascript</a>
              <a href="/questions/tagged/html" class="post-tag js-gps-track" title="" rel="tag">html</a>
              <a href="/questions/tagged/npm" class="post-tag js-gps-track" title="" rel="tag">npm</a>
              <a href="/questions/tagged/dat.gui" class="post-tag js-gps-track" title="" rel="tag">dat.gui</a> 
            </div>
          </div>

          <div class="question-user">
            <div class="mt16 grid gs8 gsy fw-wrap jc-end ai-start pt4">
              <div class="user-info ">
                <div class="user-action-time">
                  asked <span title="2020-08-14 12:44:29Z" class="relativetime">1 hour ago</span>
                </div>

                <div class="user-avatar">
                  <a href="/users/13431739/pythonisfine">
                    <div class="gravatar-wrapper-32">
                      <img src="https://www.gravatar.com/avatar/4d5478c39e22e5310f00c82eadb2884d?s=32&amp;d=identicon&amp;r=PG&amp;f=1" alt="" width="32" height="32" class="bar-sm">
                    </div>
                  </a>
                </div>

                <div class="user-details" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
                  <a href="/users/13431739/pythonisfine">PythonisFine</a>
                  <span class="d-none" itemprop="name">PythonisFine</span>
                    <div class="-flair">
                      <span class="reputation-score" title="reputation score " dir="ltr">1</span>

                      <span title="3 bronze badges" aria-hidden="true">
                        <span class="badge3"></span>
                        <span class="badgecount">3</span>
                      </span>

                      <span class="v-visible-sr">3 bronze badges</span>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end postcell right -->
      </div>
    </div>
  </div>
</div>

{{-- <div class="mt-3 ml-3 mr-3">
  <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">Show Page</h3>
      </div>
      
          <div class="card-body">
              <!-- title -->
              <div class="form-group">
                <label for="title">Title</label>
                  <div class="card-title"> {{$question->title}}</div>
              </div>
              <!-- content -->
              <div class="form-group">
                <label for="content">Content</label>
                  <div class="card-title"> {!!$question->content!!}</div> 
              </div>
              <!-- tag -->
              <div class="form-group">
                <label for="tag">Tag</label>
                  <div class="card-title"> {{$question->tag}}</div>
              </div>
          </div>
      <!-- /.card-body -->
  </div>
</div> --}}
@endsection