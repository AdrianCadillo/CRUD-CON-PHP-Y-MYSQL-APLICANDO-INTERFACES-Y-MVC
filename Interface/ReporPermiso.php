<?php
interface Repo{
  public function findById($Query,$Id);  

  public function update($Query,$datos=[]);

  public function destroy($id);
  
}