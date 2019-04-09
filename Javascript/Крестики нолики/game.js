window.onload = function()
{
    for(var i = 0; i<9; i++)
    {
        document.getElementById('game').innerHTML+='<div class="block"></div>';
    }
    var hod = 0;
    var allBlock = document.getElementsByClassName('block');
    function restartGame()
    {
        hod = 0;
        for(var i=0; i<9; i++)
        allBlock[i].innerHTML="";

    }
    document.getElementById('btn').onclick = function(event)
    {
        if(event.target.className=='button24')
        {
            restartGame();
        }
    }
    document.getElementById('game').onclick = function(event)
    {
        if(event.target.className=='block')
        {
            if(hod%2==0)event.target.innerHTML = "X";
            else
            event.target.innerHTML = "O";
            if(checkWin()==1)message();
            hod++;
        }
    }
    function message()
    {
        var msg;
        if(hod%2==0)msg="Победили крестики";
        else
        msg = "Победили нолики";
        alert(msg);
    }

    function checkWin()
    {
        if(checkGorizont(0)+checkGorizont(3)+checkGorizont(6)>0)return 1;
        if(checkVert(0)+checkVert(1)+checkVert(2)>0)return 1;
        if(checkDiag()>0)return 1;
        return 0;
    }
    function checkGorizont(i)
    {
        if(allBlock[i].innerHTML.length>0 && allBlock[i].innerHTML==allBlock[i+1].innerHTML && allBlock[i].innerHTML==allBlock[i+2].innerHTML)return 1;
        return 0;
    }
    function checkVert(i)
    {
        if(allBlock[i].innerHTML.length>0 && allBlock[i].innerHTML==allBlock[i+3].innerHTML && allBlock[i].innerHTML==allBlock[i+6].innerHTML)return 1;
        return 0;
    }
    function checkDiag()
    {
        if(allBlock[0].innerHTML.length>0 && allBlock[0].innerHTML==allBlock[4].innerHTML && allBlock[0].innerHTML==allBlock[8].innerHTML)return 1;
        if(allBlock[2].innerHTML.length>0 && allBlock[2].innerHTML==allBlock[4].innerHTML && allBlock[2].innerHTML==allBlock[6].innerHTML)return 1;
        return 0;

    }
}