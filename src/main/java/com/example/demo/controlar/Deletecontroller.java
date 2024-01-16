package com.example.demo.controlar;

import com.example.demo.entity.DeleteRequest;
import com.example.demo.mapper.Deletemapper;
import com.example.demo.mapper.Usermapper;
import org.apache.ibatis.annotations.Insert;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;

@RestController
@CrossOrigin
public class Deletecontroller {
    private String id;
    private Deletemapper deletemapper;
    @Autowired
    public Deletecontroller(Deletemapper usermapper) {
        this.deletemapper = usermapper;
    }
    @PostMapping("/delete")
    public int Deletefunc(@RequestBody DeleteRequest deleterequest)
    {
        id= deleterequest.getSentence1();
        String result=this.deletemapper.checkinvalid(id);
        result=this.deletemapper.checkexit(id);
        if(result==null)
            return -1;
         int result1=this.deletemapper.deletework(id);
        result1=this.deletemapper.deletechuqin(id);
        result1=this.deletemapper.deleteexam(id);
        result1=this.deletemapper.deleteperformence(id);
        return result1;
    }
}
