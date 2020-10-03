



function CheckFileType(filename)
{
    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
    var regex_pdf = /^([a-zA-Z0-9\s_\\.\-:])+(.pdf)$/;
    var regex_docx = /^([a-zA-Z0-9\s_\\.\-:])+(.docx)$/;
    var regex_excel = /^([a-zA-Z0-9\s_\\.\-:])+(.xls)$/;
    var  result;
    if(regex.test(filename))
    {
        result = {"success":true, "type": "img"};
    }
    else if(regex_pdf.test(filename))
    {
        result = {"success":true, "type": "pdf"};
    }
    else if(regex_docx.test(filename))
    {
        result = {"success":true, "type": "word"};
    }
    else if(regex_excel.test(filename))
    {
        result = {"success":true, "type": "excel"};
    }
    else
    {
        result = {"success":false, "type": "undifined"}
    }
    return result;
    
}


