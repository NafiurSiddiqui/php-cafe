function gitIt{

   git status
   git add -A
   git commit -m "$arg[0]"
   git push
}


gitIt [ArgumentCompleter({
   [OutputType([System.Management.Automation.CompletionResult])]
   param(
      [string] $CommandName,
      [string] $ParameterName,
      [string] $WordToComplete,
      [System.Management.Automation.Language.CommandAst] $CommandAst,
      [System.Collections.IDictionary] $FakeBoundParameters
   )
   
   $CompletionResults = [System.Collections.Generic.List[System.Management.Automation.CompletionResult]]::new()
   
   "default powerShell commit" 
   
   return $CompletionResults
})]