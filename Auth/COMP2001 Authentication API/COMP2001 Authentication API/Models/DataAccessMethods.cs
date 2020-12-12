using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;
using Microsoft.Data.SqlClient;

namespace COMP2001_Authentication_API.Models
{
    public partial class COMP2001_LTrowbridgeContext : DbContext
    {
        public void Register(Users user, out string responseMessage)
        {
            SqlParameter[] parameters = new SqlParameter[5];
            parameters[0] = new SqlParameter("@first_name", user.FirstName);
            parameters[1] = new SqlParameter("@last_name", user.LastName);
            parameters[2] = new SqlParameter("@email", user.Email);
            parameters[3] = new SqlParameter("@password", user.Password);
            parameters[4] = new SqlParameter("@response_message", "");
            parameters[4].Direction = System.Data.ParameterDirection.Output;
            parameters[4].Size = 100;
            Database.ExecuteSqlRaw("EXEC register @first_name, @last_name, @email, @password, @response_message OUTPUT", parameters);
            responseMessage = (string)parameters[4].Value;
        }
    }
}
