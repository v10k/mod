$(document).ready(function(){
    $('.jqtree-element span').on('dblclick', startEditing);
    $('.jqtree-element span').on('blur', stopEditing);
    $('#tree1').on('tree.move', updateNodeRelationship);
});


function updateNodeRelationship(e){
    var pai =  e.move_info.target_node;
    var mid = e.move_info.moved_node.id;
    $.post('http://localhost/lp6/index.php/menu/update', {item:mid, parent:pai.id}, function(d){});
    
    setTimeout(function(){
        var pos = [];
        for (var i=0; i < pai.children.length; i++) {
            var child = pai.children[i];
            pos.push(child.id);
        }
        $.post('http://localhost/lp6/index.php/menu/setorder', {itens:pos}, function(d,s,x){});
    }, 1000);
}


var selectedItem;
var editing = false;
function startEditing(){
    $(this).attr('contenteditable', true).focus();
    selectedItem = $(this).text();
    editing = true;
}

function stopEditing(){
    if(editing && selectedItem != $(this).text()){
        var name = $(this).text();
        var id = $(this).attr('id');
        $.post('http://localhost/lp6/index.php/menu/setlabel', {name:name, id:id}, function(d,s,x){})
    }
    $(this).attr('contenteditable', false);
    editing = false;
}