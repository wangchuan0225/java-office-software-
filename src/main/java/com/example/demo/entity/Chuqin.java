package com.example.demo.entity;

public class Chuqin {

        int absence;
        int attend;
        int id;
        public int getAbsence(){return absence;}
        public int getAttend(){return attend;}
        public int getId(){return id;}

        @Override
        public String toString() {
                return "id:"+id+"attend:"+attend;
        }
}
