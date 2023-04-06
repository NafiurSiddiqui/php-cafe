# function gitIt{

#    git status
#    git add -A
#    git commit -m "$args[0]"
#    git push
# }


# gitIt "default powerShell commit" 

function gitIt {
   git status
   git add -A
   # Prompt the user to enter a commit message
   $message = Read-Host "Enter a commit message"
   git commit -m "$message"
   git push
}

gitIt
