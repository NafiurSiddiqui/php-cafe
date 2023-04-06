function gitIt{

   git status
   git add -A
   git commit -m "$args[0]"
   git push
}


gitIt "default powerShell commit" 