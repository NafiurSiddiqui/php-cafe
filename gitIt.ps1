# function gitIt{

#    git status
#    git add -A
#    git commit -m "$args"
#    git push
# }


# gitIt "default powerShell commit" 

function gitIt {
   git status
   git add -A
   # Prompt the user to enter a commit message
   $message = Read-Host "Enter aa commit message"
   git commit -m "$message"
   git push
}

gitIt
