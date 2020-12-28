using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Data.SqlTypes;
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

        public bool Validate(Users userToValidate)
        {
            SqlParameter[] parameters = new SqlParameter[3];
            parameters[0] = new SqlParameter("@email", userToValidate.Email);
            parameters[1] = new SqlParameter("@password", userToValidate.Password);
            parameters[2] = new SqlParameter("@validated", -1);
            parameters[2].Direction = System.Data.ParameterDirection.Output;
            Database.ExecuteSqlRaw("EXEC @validated = validate_user @email, @password", parameters);
            return Convert.ToBoolean(parameters[2].Value);
        }

        public void UpdateUser(int id, Users userToUpdate)
        {
            SqlParameter[] parameters = new SqlParameter[5];
            parameters[0] = new SqlParameter("@id", id);
            parameters[1] = NullIfEmpty("@first_name", userToUpdate.FirstName);
            parameters[2] = NullIfEmpty("@last_name", userToUpdate.LastName);
            parameters[3] = NullIfEmpty("@email", userToUpdate.Email);
            parameters[4] = NullIfEmpty("@password", userToUpdate.Password);
            Database.ExecuteSqlRaw("EXEC update_user @id, @first_name, @last_name, @email, @password", parameters);
        }

        private SqlParameter NullIfEmpty(string parameterName, string stringToUpdate)
        {
            // Used to encapsulate the detection of a null value in the case of a blank value passed into the endpoint
            if (stringToUpdate == "")
            {
                return new SqlParameter(parameterName, DBNull.Value);
            }
            else
            {
                return new SqlParameter(parameterName, stringToUpdate);
            }
        }

        public bool LookupAPIKey(string apiKey)
        {
            // This is where a call to a stored procedure to do a lookup in a database against a hashed version would go, but
            //  for demonstration purposes we will compare against a hardcoded example key here
            string tempHardcodedKey = "OTM4NDA5MjM3MDczOTA";
            return apiKey == tempHardcodedKey;
        }
    }
}
