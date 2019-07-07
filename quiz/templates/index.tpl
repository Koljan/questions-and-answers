{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=foo}
<div class="container">
  <div class="py-2 text-center">
    <h2>QUIZ</h2>
{*      {$session_id|var_dump}*}
{*    {$smarty.session[$session_id]['questions']|var_dump}*}
{*      {foreach $smarty.session[$session_id]['questions'] as $question}*}
{*        {$question@key}*}
{*      {/foreach}*}
  </div>

  <div class="row questions-wrapper">
    <div class="col-12">
      <form class="needs-validation" novalidate>
        {foreach from=$smarty.session[$session_id]['questions'] item=question name=foo}
            {foreach $question['question'] as $quest}
                <div id="question-id-{$question@key}" class="row question-wrapper">
                    <div class="col-12">
                        <h4>Question #{$question@index+1} out of {$smarty.foreach.foo.total}</h4>
                        <label for="question-{$question@key}">{$quest}</label>
                        <input type="text" class="form-control" id="question-{$question@key}" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Number of symbols should be from 0 to 4
                        </div>
                    </div>
                </div>
            {/foreach}
            {if $smarty.foreach.foo.last}
            {/if}
        {/foreach}
        </div>
      <div class="col-12 mt-3">
        <a class="btn btn-outline-primary proceed-previous-q showEl" href="#" role="button">Previous</a>
        <a class="btn btn-outline-primary proceed-next-q showEl" href="#" role="button">Next</a>
          <button type="submit" class="btn btn-primary btn-submit hideEl">Submit</button>
      </div>
      </form>
    </div>
    <div class="row form-submit-user hideEl">
        <div class="col-12">
            <form class="form-signin">
                <h1 class="h3 mb-3 font-weight-normal">User</h1>
                <label for="inputName" class="sr-only">Name</label>
                <input class="form-control" type="text" value="" id="inputName" placeholder="Name">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                <label for="inputPassword" class="sr-only">Password</label>
                <input class="form-control" type="tel" value="555-5555" id="example-tel-input">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
  </div>
</div>

{block name=footer_javascript}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $('.dropdown-toggle').dropdown();
    </script>
{/block}
{include file="footer.tpl"}
